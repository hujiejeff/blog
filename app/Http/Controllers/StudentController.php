<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StudentController
{
    public function test1()
    {
        //查询
//        $students = DB::select('select * from student');
        //插入
//        $bool = DB::insert('insert into student (name,age) value (?,?)',
//            ['hujie',20]);
//        var_dump($bool);
        //更新
//        $num = DB::update('update student set age = ? where name = ?',
//            [30, 'hujie']);
//        var_dump($num);
//        dd($students);
        //删除
        $num = DB::delete('delete from student where id > ?', [1001]);
    }

    public function query1()
    {
        //插入
//        $bool = DB::table('student')->insert([
//            'name' => 'hujie2',
//            'age' => '18'
//        ]);
//        dd($bool);
        //插入返回id
//        $id = DB::table('student')->insertGetId([
//            'name' => 'hujie3',
//            'age' => 20
//        ]);
//        dd($id);
        //插入多条
        $bool = DB::table('student')->insert([
            ['name' => 'jeff', 'age' => 30],
            ['name' => 'hujiejeff', 'age' => 12]
        ]);
        dd($bool);
    }

    public function query2()
    {
        //更新数据
//        $num = DB::table('student')
//            ->where('id',1001)
//            ->update(['name' => 'kk']);
//        dd($num);
        //自增
//        $num = DB::table('student')->increment('age');
        $num = DB::table('student')
            ->where('age', 29)
            ->decrement('age', 1, ['sex' => 20]);
    }

    public function query3()
    {
        //删除数据
//        $num = DB::table('student')
//            ->where('id', 1001)
//            ->delete();
        //多条删除
        $num = DB::table('student')
            ->where('id', '>=', 1006)
            ->delete();
        dd($num);

        //删除整个表
//        DB::table('student')->truncate();
    }

    public function query4()
    {
        //获得所有 get
//        $students = DB::table('student')->get();
        //获取第一条 first
//        $students = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();
        // where
//        $students = DB::table('student')
//            ->where('id','>=',1004)
//            ->get();
        //whereRaw
//        $students = DB::table('student')
//            ->whereRaw('id > ? and age > ?',[1001,19])
//            ->get();
        //pluck 投影
//        $students = DB::table('student')
//            ->pluck('name');
        //select
//        $students = DB::table('student')
//            ->select('name', 'age')
//            ->get();
        //chunk
        $students = DB::table('student')->orderBy('id', 'desc')->chunk(1, function ($students) {
            echo '<pre/>';
            var_dump($students);
        });
//        dd($students);
    }

    public function query5()
    {
        //聚合函数

        //count
        $num = DB::table('student')->count();
        //max
        $max = DB::table('student')->max('age');
        //min avg sum
        dd($max);
    }

    public function orm1()
    {
//        $students = Student::all();
//        dd($students);
//        $student = Student::findOrFail(1009);
//        dd($student);
        $students = Student::get();
        dd($students);
    }

    public function orm2()
    {
//        $student = new Student();
//        $student->name = 'orm';
//        $student->age = 18;
//        $bool = $student->save();
//        dd($bool);

//        $student = Student::find(1007);
//        dd($student->created_at);

//        $student = Student::create(['name' => 'lll', 'age' => 99]);
//        dd($student);
        //firstOrCreate 以属性查找，没有则新建记录
        //firstOrNew 以属性查找，没有则新建对象，需要自己保存记录
    }

    public function orm3()
    {
        $student = Student::find(1007);
        $student->name = 'chang';
        $bool = $student->save();
        dd($bool);
    }

    public function blade()
    {
        return view('student.test', [
            'name' => 'hujie1',
        ]);
    }

    public function request1(Request $request)
    {
        //取值
        $name = $request->input('name', 'kong');
        echo $name;
    }

    public function session1(Request $request)
    {
        //1 http session
//        $request->session()->put('name','hujie');
        //2 session()
//        session()->put('name','hujie2');
        //3 Session
//        Session::put('name','hujie3');
        //数组存放
//        Session::put(['name' => 'huje4']);
        //存数组
        Session::push('name1', 'hujie5');
        Session::push('name1', 'kkkkkk');
    }

    public function session2(Request $request)
    {
//        dd($request->session()->get('name1'));
//        Session::pull('name1');取完删除
        return Session::get('message', 'null');
//        dd(Session::all());
        //has 判断
//        Session::has('name');
        //删除
//        Session::forget('name');
        //清空session
//        Session::flush();
        //flash 暂存数据 只会出现在第一次
        //Session::flash();
    }

    public function response1()
    {
        //相应json
//        $data = ['name' => 'hujie', 'age' => 18];
//        return response()->json($data);
        //重定向 with 快闪数据
//        return redirect('session2')->with('message','test');
        //action
        //
        return redirect()->back(302);
    }

    public function activity0()
    {
       // return '活动快要开始了，敬请期待';
        abort(503);
    }

    public function activity1()
    {
        return '活动进行中';
    }

    public function mail()
    {
//        Mail::raw('邮件内容 测试2', function ($message) {
//            $message->from('hujiejeff@163.com','胡杰');
//            $message->subject('主题 测试');
//            $message->to('2048779651@qq.com');
//        });
        Mail::send('index.index',['name' => 'hujie'],function ($message){
            $message->to('2048779651@qq.com');
        });
    }

}