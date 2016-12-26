<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Http\Controllers\Controller;
use App\Repositories\Plan\PlanRepositoryContract;
use App\Repositories\Car\CarRepositoryContract;
use App\Repositories\Want\WantRepositoryContract;
use App\Repositories\Chance\ChanceRepositoryContract;
use App\Repositories\Book\BookRepositoryContract;
use App\Http\Requests\Plan\UpdatePlanRequest;
use App\Http\Requests\Plan\StorePlanRequest;

class PlanController extends Controller
{
    
    protected $plan;
    protected $car;
    protected $want;
    protected $chance;
    protected $book;

    public function __construct(

        PlanRepositoryContract $plan,
        CarRepositoryContract $car,
        WantRepositoryContract $want,
        ChanceRepositoryContract $chance,
        BookRepositoryContract $book
    ) {

        $this->plan   = $plan;
        $this->car    = $car;
        $this->want   = $want;
        $this->chance = $chance;
        $this->book   = $book;


        // $this->middleware('brand.create', ['only' => ['create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans = $this->plan->getAllPlans($request);

        /*p(lastSql());
        dd($plans);
        dd($plans[0]->belongsToChance);*/

        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
        $chance_info = $this->chance->find($request->chance_id);
        $car_info    = $this->car->find($request->car_id);
        $want_info   = $this->want->find($request->want_id);

        // dd($chance_info);
        // dd($car_info->belongsToCustomer);
        // dd($want_info);
        return view('admin.plan.create',compact(
            'chance_info', 
            'car_info', 
            'want_info'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * 约车发起/确认
     * @return \Illuminate\Http\Response
     */
    public function planLaunch(Request $request)
    {
        // dd($request->all());
        $plan = $this->plan->planLaunch($request);

        if($request->chance_status == 1){

            return response()->json(array(
                'data'       => $plan,
                'msg'        => '发起约车成功',
                'msg_change' => '待确认',
            ));
        }elseif($request->chance_status == 2){

            return response()->json(array(
                'data'       => $plan,
                'msg_change' => '已确认',
                'msg'        => '确认约车成功',
            ));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($brandRequest->all());
        $getInsertedId = $this->plan->create($request);
        // p(lastSql());exit;
        return redirect()->route('admin.plan.index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan_info   = $this->plan->find($id);
        $chance_info = $this->chance->find($plan_info->chance_id);
        $car_info    = $this->car->find($chance_info->car_id);
        $want_info   = $this->want->find($chance_info->want_id);

        //dd($chance_info);
        //dd($plan_info);

        return view('admin.plan.edit',compact(
            'chance_info', 
            'plan_info', 
            'car_info',
            'want_info'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $book_created = (object) false;
        $book_id      = (object) '';

        DB::transaction(function() use ($request, $id, $book_created, $book_id){
            if($request->plan_del == '1'){

                $book = $this->book->create($request->chance_id);   
                $plan = $this->plan->update($request, $id);
                // dd($book->id);
                // dd($book_id);
                $book_created->scalar  = true;
                $book_id->scalar       = $book->id;

                Session::flash('sucess', '恭喜您，该销售机会成功转为订单，请及时跟进');               
            }else{

                $plan = $this->plan->update($request, $id);
                Session::flash('sucess', '革命尚未成功，同志仍需努力');
            }
        });

        if($book_created->scalar){

            return redirect()->route('admin.book.edit', ['plan'=>$book_id->scalar])->withInput();
        }else{
            // dd('xixi');
            return redirect()->route('admin.plan.index')->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
