<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/29 0029
 * Time: 15:14
 */

namespace suojinhua\view;

//1.写一个View方法
//2.通过它里面的方法来调用Base控制器来操作
class View
{
    //1.写一个静态__callStatic方法
    //2.调用该类没有的静态方法时 会触发该方法 来运行里面的代码  来调用Base
    public static function __callStatic($name, $arguments)
    {
        //1.调用Base控制器 里面的$name方法
        //2.通过Base来实现想要的功能
       return call_user_func_array([new Base(),$name],$arguments);
    }
    //1.写一个__call方法
    //2.调用该类没有的方法时 会触发该方法 来运行里面的代码
    public function __call($name, $arguments)
    {
        //1.调用Base控制器 里面的$name方法
        //2.通过Base来实现想要的功能
       return call_user_func_array([new Base(),$name],$arguments);
    }
}
