<?php
	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Session;
	use App\ProductDetail;
	use App\Slide;
	use App\Product;
	use App\Cart;
	use App\User;
	use App\Bill;
	use App\BillDetail;
	use App\ProductType;
	use Hash;
	use Auth;
	use DB;
	use DateTime;

	class PagesController extends Controller
	{
		public function getIndex() {
			$slide = Slide::all();
			
			$lastestProduct = DB::table('products')
										->select('id', 'name', 'image', 'unit_price', 'visited')
										->orderByRaw('ABS(DATEDIFF( created_at, NOW() ))')
										->take(10)->get();

			$bestSeller = DB::table('products')
									->select('id', 'name', 'image', 'unit_price', 'visited')
									->orderBy('unit_sold', 'desc')
									->take(10)->get();

			return view('Pages.home', [ 'slide'				=> $slide, 
								 		'lastestProduct'	=> $lastestProduct,
								 		'bestSeller'		=> $bestSeller ]);
		}


		public function getProductsByName($name) {
			$productsByName = DB::table('products')
								->join('type_products', 'products.id_type', '=', 'type_products.id')
								->select('products.id','products.image','products.name as pname', 'products.visited', 'type_products.name','products.unit_price')
								->where('type_products.name',$name)->get();

			return view('Products.ByName.index', ['productsByName' => $productsByName]);
		}


		public function getProductsByPrice(Request $request) {
			if ($request->has('below')) {
				$productsByPrice = DB::table('products')
							->where('unit_price', '<', '1000000')
							->select('id', 'name', 'image', 'visited', 'unit_price')->get();

				return view('Products.ByPrice.index', ['productsByPrice' => $productsByPrice,
														'request' => $request]);
			}
			if ($request->has('over')) {
				$productsByPrice = DB::table('products')
							->where('unit_price', '>', '15000000')
							->select('id', 'name', 'image', 'visited', 'unit_price')->get();

				return view('Products.ByPrice.index', ['productsByPrice' => $productsByPrice,
														'request' => $request]);			
			}

			$from = $request->query('from');
			$to = $request->query('to');

			$productsByPrice = DB::table('products')
							->whereBetween('unit_price', [$from.'000000',$to.'000000'])
							->select('id', 'name', 'image', 'visited', 'unit_price')->get();

			return view('Products.ByPrice.index', ['productsByPrice' => $productsByPrice,
														'request' => $request]);
		}


		public function getProductsByFeature(Request $request) {
			
			if ($request->get("special") == "van-tay") {
				$productsByFeature = DB::table('product_detail as pd')									
										->where('detail->feature->security', 'like', '%vân tay%')
										->join('products as p', 'pd.id_product', '=', 'p.id')
										->select('p.id', 'p.name', 'p.image', 'p.visited', 'p.unit_price')->get();

				return view('Products.ByFeature.index', ['productsByFeature' => $productsByFeature,
															'request' => $request]);
			}

			if ($request->get("special") == "4g") {
				$productsByFeature = DB::table('product_detail as pd')
										->where('detail->connect->mobileInternet', 'like' ,'%4G%')
										->join('products as p', 'pd.id_product', '=', 'p.id')
										->select('p.id', 'p.name', 'p.image', 'p.visited', 'p.unit_price')->get();

				return view('Products.ByFeature.index', ['productsByFeature' => $productsByFeature,
															'request' => $request]);
			}
			
			if ($request->get("special") == "chong-nuoc") {
				$productsByFeature = DB::table('product_detail as pd')									
										->where('detail->feature->special', 'like', '%Kháng nước%')
										->join('products as p', 'pd.id_product', '=', 'p.id')
										->select('p.id', 'p.name', 'p.image', 'p.visited', 'p.unit_price')->get();

				return view('Products.ByFeature.index', ['productsByFeature' => $productsByFeature,
															'request' => $request]);
			}

			if ($request->get("special") == "2-sim") {
				$productsByFeature = DB::table('product_detail as pd')									
										->where('detail->connect->sim', 'like', '%2 SIM%')
										->join('products as p', 'pd.id_product', '=', 'p.id')
										->select('p.id', 'p.name', 'p.image', 'p.visited', 'p.unit_price')->get();

				return view('Products.ByFeature.index', ['productsByFeature' => $productsByFeature,
															'request' => $request]);
			}
		}


		public function getProductsDetail(Request $request) {
			
			$product_id = $request->get('id');
			
			$p = Product::find($product_id);
			$p->visited = (($p->visited) + 1);		
			$p->save();

			$product = DB::table('products as p')
							->where('p.id', '=', $product_id)
							->join('product_detail as pd', 'p.id', '=', 'pd.id_product')
							->select('p.id', 'p.name', 'p.image', 'p.visited', 'p.unit_price', 'pd.detail')->get();
			
			$getProductType = Product::where('id',$product_id)->select('id_type')->get();
			$product_type = $getProductType[0]['attributes']['id_type'];

			$relate_product = Product::where('id_type', $product_type)
									->select('id', 'name', 'image', 'visited', 'unit_price')
									->inRandomOrder()->take(5)->get();		

			return view('Products.detail', ['product' => $product, 'relate_product' => $relate_product]);
						
		}


		public function getAddToCart(Request $request, $id) {
			$product = Product::find($id);

			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);

			$cart->add($product, $id);		
			$request->session()->put('cart', $cart);
			return redirect()->back();
		}


		public function getDelCart($id) {
			$oldCart = Session::has('cart') ? Session::get('cart'):null;
			$cart = new Cart($oldCart);
			//dd($cart);exit;
			$cart->removeItem($id);
			if (count($cart->items) > 0) {
				Session::put('cart', $cart);	
			}
			else {
				Session::forget('cart');
			}
			return redirect()->back();
		}


		public function getDecreaseQty($id) {
			$oldCart = Session::has('cart')?Session::get('cart'):null;

			$cart = new Cart($oldCart);

			$cart->reduceByOne($id);
			if (count($cart->items) > 0) {
				Session::put('cart', $cart);
			}
			else {
				Session::forget('cart');
			}
			return redirect()->back();
		}


		public function getIncreaseQty($id) {
			$oldCart = Session::has('cart')?Session::get('cart'):null;

			$cart = new Cart($oldCart);

			$cart->increaseByOne($id);
			if (count($cart->items) > 0) {
				Session::put('cart', $cart);
			}
			else {
				Session::forget('cart');
			}
			return redirect()->back();
		}


		public function getDatHang() {
			return view('Pages.checkout');
		}


		public function getThanhToan(Request $request) {		
			if ($request->session()->has('cart')) {
				$cart = $request->session()->get('cart');

				$bill = new Bill();
				$bill->id_customer = Auth::user()->id;
				$bill->total = $cart->totalPrice;
				$bill->date_order = new DateTime();
				$bill->save();			

				foreach ($cart->items as $key => $value) {
					$billDetail = new BillDetail();
					$billDetail->id_bill = $bill->id;
					$billDetail->id_product = $value['item']['attributes']['id'];
					$billDetail->quantity =  $value['qty'];
					$billDetail->unit_price = $value['item']['attributes']['unit_price'];
					$billDetail->save();

					$p = Product::find($billDetail->id_product);
					$p->unit_in_stock -= $billDetail->quantity;
					$p->unit_sold += $billDetail->quantity;
					$p->save();
				}
				
				$request->session()->forget('cart');

				return redirect('home');
			}
			else {
				return redirect('home');
			}

			
		}


		public function getLogin() {
			return view('Pages.login');
		}


		public function postLogin(Request $req) {
			$this->validate($req,
				[
					'email' => 'required|email',
	                'password' => 'required|min:6|max:20'
				],
				[
					'email.required' => 'Vui lòng nhập email',
	                'email.email' => 'Không đúng định dạng email',                
	                'password.required' => 'Vui lòng nhập mật khẩu',
	                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
	                'password.max' => 'Mật khẩu không quá 20 ký tự'
				]
			);
			$credentials = array('email'=>$req->email, 'password'=>$req->password);
			$user = User::where([
				['email','=',$req->email]
			])->first();
			

			if ($user) {						
				if(Auth::attempt($credentials)) {
					if ($user['attributes']['email'] == 'admin@mobishop.com') {
						return redirect(route('admin-page'));
					}
					return redirect('home');
				}
				else {
					return redirect()->back()->with(['flag'=>'fail', 'message'=>'Đăng nhập thất bại']);
				}
			}
			else {
				return redirect()->back()->with(['flag'=>'danger', 'message'=>'Tài khoản không tồn tại']);
			}
		}


		public function getReg() {
			return view('Pages.signup');
		}


	    public function postReg(Request $req) {
	    	//dd($req); exit;    	
	        $this->validate($req,
	            [
	                'email' => 'required|email|notAdmin|unique:users,email',
	                'password' => 'required|min:6|max:20',
	                'fullname' => 'required|notAdmin',
	                're-password' => 'required|same:password',
	                'g-recaptcha-response' => 'required|captcha'
	            ],
	            [
	                'email.required' => 'Vui lòng nhập email',
	                'email.email' => 'Không đúng định dạng email',                
	                'email.unique' => 'Email đã có người sử dụng',
	                'password.required' => 'Vui lòng nhập mật khẩu',
	                're-password.same' => 'Mật khẩu không giống nhau',
	                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
	                'g-recaptcha-response.required' => 'Xin hãy xác nhận bạn không phải là robot'
	            ]);
	        $user = new User();
	        $user->full_name = $req->fullname;
	        $user->email = $req->email;
	        $user->password = Hash::make($req->password);  
	        if ($req->has('birthday') || $req->birthday != null)
	        	$user->birthday = $req->birthday;
	        if ($req->has('hometown'))
	        	$user->hometown = $req->hometown;
	       	//dd ($user); exit;    
	        $user->save();
	        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
	    }


	    public function getLogout() {
	    	Auth::logout();
	    	Session::flush();
	    	return redirect('home');
	    }


	    public function getAdmin() {    	
	    	if (Auth::user()['attributes']['email'] == 'admin@mobishop.com') {
	    		
	    		$product = DB::table('type_products as pt')
	    						->join('products as p', 'p.id_type','=','pt.id')
	    						->select('p.id', 'p.name', 'pt.name as typename', 'p.unit_price', 'p.image', 'p.unit_in_stock', 'p.unit_sold', 'p.visited')->get();

	    		
				$producer = DB::table('type_products as tp')
									->join('products as p', 'p.id_type', '=', 'tp.id')
									->select('tp.id', 'tp.name', DB::raw('SUM(p.unit_in_stock) as totalInStock'), DB::raw('SUM(p.unit_sold) as totalSold'))
									->groupBy('p.id_type')->get();

				$users = DB::table('users')
								->select('id', 'email', 'full_name', 'birthday', 'hometown')->get();

				
				$bill = DB::select(DB::raw('select u.full_name, (select p.name 
																  from products as p
																  where p.id = bd.id_product) as pName , b.id, b.total, bd.quantity, b.date_order, b.status 
											from bills b, bill_detail bd, users u 
											where b.id = bd.id and u.id = b.id_customer'));

	    		return view('Admin.home', ['user' => Auth::user(), 
							    		   'product' => $product, 
							    		   'producer' => $producer, 
							    		   'users' => $users, 
							    		   'bill' => $bill]);   
	    	}
	    	else {
	    		return redirect('home');
	    	}
	    }


	    public function getAdminLogout() {
	    	Auth::logout();
	    	Session::flush();
	    	return redirect('home');
	    }


	    public function getProfile() {

	    }

	    public function postSearch(Request $req) {
			$searchResult = DB::table('products')
										->select('id', 'name', 'image', 'unit_price')
										->where('name', 'like', '%' . $req->search . '%')
										->get();

			return view('Pages.result', ['searchResult'	=> $searchResult]);
		}

		public function getAdvancedSearch() {
			return view('Pages.AdvancedSearch');
		}

		public function postAdvancedSearch(Request $req) {
			//dd($req);
			$temp = DB::table('products')
					->join('product_detail', 'products.id', '=', 'product_detail.id_product');

			if (!empty($req->productName)) {
				$temp->where('name', 'like', '%'. $req->productName.'%');
			}

			if ($req->has('id_type')) {
				$temp->where('id_type', $req->id_type);			
			}

			if ($req->has('price')) {
				$temp->where('unit_price', '>', $req->price);
			}

			if ($req->has('camera')) {
				$temp->where('detail->camera-back->resolution', 'like', '%' . $req->camera . '%');
			}

			if ($req->has('resolution')) {
				$temp->where('detail->screen->resolution', 'like', '%' . $req->resolution . '%');
			}	

			if ($req->has('rom')) {
				$temp->where('detail->memory-storage->intStorage', '=', $req->rom);
			}

			if ($req->has('ram')) {
				$temp->where('detail->memory-storage->ram', '=', $req->ram);
			}

			if ($req->has('battery')) {
				$temp->where('detail->battery->capacity', '>=', $req->battery);
			}	

			$searchResult = $temp->get();

			return view('Pages.result', ['searchResult'	=> $searchResult]);
		}

		public function getAdminDelete(Request $r, $id) {
			if ($r->tab == '1') {
				$p = Product::destroy($id);
				return redirect('u/admin#qldt');
			}
			else if ($r->tab == '2') {
				return redirect('u/admin#qlldt');
			}
			else if ($r->tab == '3') {
				$u = ProductType::destroy($id);
				return redirect('u/admin#qlnsx');
			}			
			else if ($r->tab == '4') {
				$u = User::destroy($id);
				return redirect('u/admin#qlnd');
			}
			else if ($r->tab == '5') {
				$u = Bill::destroy($id);
				return redirect('u/admin#qldh');
			}
			else
				return redirect('u/admin#');
		}

		public function getAdminEditProduct($email, $id, $productName, $typeName, $unitPrice, $image) {
			return view('Admin.edit', ['email' => $email, 'id' => $id,
									   'productName' => $productName, 
								       'typeName' => $typeName, 'unitPrice' => $unitPrice,
								       'image' => $image]);
		}

		public function getEditProducer($email, $id, $name) {
			return view('Admin.edit2', ['email' => $email, 'id' => $id,
									   'name' => $name]);
		}

		public function postEditProducer(Request $r) {
			$p = ProductType::find($r->id);
			$p->name = $r->name;
			$p->save();
			return redirect('u/admin#qlnsx');
		}

		public function postEditProduct(Request $r) {
			$p = Product::find($r->id);
			$p->id = $r->id;
			$p->name = $r->productName;

			$pd = ProductType::where('name', $r->typeName)->first();
			$p->id_type = $pd->id;

			$p->unit_price = $r->unitPrice;
			$p->image = $r->image;			
			$p->save();
			return redirect('u/admin#qldt');
		}

		

		public function getAdminAdd(Request $r, $email) {
			return view('Admin.add', ['email' => $email, 'tab' => $r->tab]);
		}

		public function postAddIndex(Request $r, $mode) {
			if ($mode == '1') {
				$p = new Product;
				$p->name = $r->productName;

				$pd = ProductType::where('name', $r->typeName)->first();		
				$p->id_type = $pd->id;		

				$p->unit_price = $r->unitPrice;
				$p->image = $r->image;		
				$p->unit_in_stock = '0';
				$p->unit_sold = '0';
				$p->visited = '0';	
				$p->save();
				//dd($p); exit;
				return redirect('u/admin#qldt');
			}
			else if ($mode == '2') {
				return redirect('u/admin#qlldt');
			}
			else if ($mode == '3') {
				$p = new ProductType;
				$p->name = $r->typeName;
				$p->save();
				return redirect('u/admin#qlnsx');
			}
			else if ($mode == '4') {
				$u = new User;
				$u->email = $r->email;
				$u->password = Hash::make($r->password);
				$u->full_name = $r->fullname;
				if ($r->has('birthday') || $r->birthday != null)
					$u->birthday = $r->birthday;
				if ($r->has('hometown'))
					$u->hometown = $r->hometown;
				$u->save();
				return redirect('u/admin#qlnd');
			}
			else if ($mode == '5') {
				return redirect('u/admin#qldh');
			}
		}
 		
 		public function getDeliver($id) {
 			$b = Bill::find($id);
 			$b->status = '1';
 			$b->save();
 			return redirect('u/admin#qldh');
 		}

 		public function getEditUser($email, $id, $Uemail, $name, $birthday = null, $hometown = null) {
			return view('Admin.edit3', ['email' => $email, 'id' => $id,
									   'Uemail' => $Uemail, 'name' => $name,
										'birthday' => $birthday, 'hometown' => $hometown]);
		}

		public function postEditUser(Request $r) {
			$u = User::find($r->id);
			$u->email = $r->Uemail;
			$u->full_name = $r->name;
			$u->password = hash::make($r->password);
			if ($r->has('birthday') || $r->birthday != null)
				$u->birthday = $r->birthday;
			if ($r->has('hometown'))
				$u->hometown = $r->hometown;
			$u->save();
			return redirect('u/admin#qlnd');
		}
 	}

?>