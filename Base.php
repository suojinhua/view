<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/29 0029
 * Time: 15:16
 */

namespace suojinhua\view;


class Base
{
    //1.设置一个私有属性
    //2.用来获得组合好的路径
    private $file;
    //1.设置一个私有属性
    //2.用来获得传进来的参数
    private $var=[];
    //1.写一个组合路径的方法
    //2.d调用他的时候会通过获得get传的参数生成的常量来组合相应的路径 并且赋给$file
    public function make(){
        //1.组合路径
        //2.通过获得get传的参数生成的常量来组合相应的路径 并且赋给$file
       $this->file="../app/".MODULE."/view/".CONTROLLER.'/'.ACTION.'.php';
       //1.返回对象
        //2.方便链式调用
       return $this;
    }
    //1.写一个传递数据的方法
    //2.调用它的时候通过传递数据 把数据显示到页面上
    public function with($var){
        //1.获得传进来的数据
        //2.在__toString里要调用var属性来获得数据
        $this->var=$var;
        //1.返回对象
        //2.方便链式调用
        return $this;
    }
    //1.写一个__toString方法
    //2.输出对象的时候会触发他来运行里面的代码
    //3.在boot控制器里echo控制器是触发
    public function __toString()
    {
        $data=$this->var;
//        fun($data);
//        exit;
        //1.转化var属性
        //2.转化成原来的数组
        extract($this->var);
        //1.引入页面
        //2.完成页面的显示
       include $this->file;
       //1.return空字符串
        //2.这个方法必须返回一个字符串 如果不想要返回数据的话就写成空字符串
       return '';
    }
}