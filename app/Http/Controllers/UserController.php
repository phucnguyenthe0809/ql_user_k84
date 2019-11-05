<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{AddUserRequest,EditUserRequest};
use App\Models\Users;
class UserController extends Controller
{
    function getUser() {
    //   hiển thị view 
    //  phải tồn tại view trong file views
        //lệnh render view ra màn hình
        $data['users']=Users::paginate(10);
        return view('user',$data);
    }


    function getAddUser() {
        return view('add_user');
    }
    function postAddUser(AddUserRequest $r)
    {
        // $r: Nơi Chứa dữ liệu ô input 
        //$r->all() : phương thức lấy dự liệu trong $r
        //dd() : hiển thị tất cả các loại dữ liệu 1 cách chuẩn 
        // khi chạy dd() sẽ dừng toàn bộ chương trình

        //Kiểm tra dữ liệu bằng request
        //Cấu trúc :$r->request([mảng chứ các quy tắc],[mảng chứa các lời thông báo khi lỗi]);

        // key: name của ô input
         // value: Quy tắc tương ứng vơi ô input đó (các quy tắc ngăn cách nhau bởi "|" )
        //  $rules=[
        //     "full"=>"required|min:3",
        //     "phone"=>"required|numeric",
        //     "address"=>"required",
        //     "id_number"=>"required"
        //  ];

         //key:  "[tên ô input].[Lỗi tương ứng]"
         //value: Lời thông báo tương ứng với lỗi đó

        //  $messages=[
        //     "full.required"=>"Không được để trống họ và tên",
        //     "full.min"=>"Không đươc nhỏ hơn 3 ký tự",

        //     "phone.required"=>"Không được để trống số điện thoại",
        //     "phone.numeric"=>"Số điện thoại phải là số",
            
        //     "address.required"=>"Không được để trống địa chỉ",
        //     "id_number.required"=>"Không được để trống số chứng minh thư",

        //  ];
        // $r->validate($rules,$messages);
        echo 'VƯỢT QUA';
        $user=new Users;
        $user->full=$r->full;
        $user->phone=$r->phone;
        $user->address=$r->address;
        $user->id_number=$r->id_number;
        $user->save();
        echo 'đã thêm thành công';

    }


    function getEditUser($idUser) {
        $data['user']=Users::find($idUser);
        return view('edit_user',$data);
    }

    function postEditUser($idUser,EditUserRequest $r)
    {
        $user=Users::find($idUser);
        $user->full=$r->full;
        $user->phone=$r->phone;
        $user->address=$r->address;
        $user->id_number=$r->id_number;
        $user->save();
       //lùi lại trang 
       //->with('key','value'); tạo session flash
       return redirect()->back()->with('thongbao','Đã sửa thành công!');
    }

    function delUser($idUser)
    {
        Users::destroy($idUser);
        return redirect()->back();
    }
}
