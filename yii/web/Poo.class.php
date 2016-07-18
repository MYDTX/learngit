<?php
header('content-type:text/html;charset=utf8');
/*
 *用途 原生php代码方便操作数据库
 *     方便大家快速效率的去编写程序
 *     目前肯定有许多瑕疵
 *     本人初学水平有限
 *     欢迎大家指出不足之处 邮箱 1351369437@qq.com
 * 	   方便修改 以便于更好的服务于大家
 *编写 叶未寒
 *时间 2016 6 22 19 43
 *
 * */
include ('lianjie.php');
class Poo{
	public $mysql;
	/*
	 * 构造函数 __construct
	 *
	 * 参数    类型      解义
	 * $dbname string    数据库名
	 *
	 * 返回值  string
	 * */
	function __construct(){
		$this->mysql=new PDO(SESSION_DNS,SESSION_USR,SESSION_PWD);
		$this->mysql->query('set names utf8');
	}
	/*
	 * 查询字段 find
	 *
	 * 参数    类型      解义
	 * $str    string    查询字段
	 * $table  string    表名
	 * $where  string    查询条件 不填默认为1
	 *
	 * 返回值  string
	 * */
	function find($str,$table,$where=1){
		$sql="select $str from $table where $where";
		$data=$this->readexecute($sql);
		return $data['0']["$str"];
	}
	/*
	 * 单表查询 select
	 *
	 * 参数    类型      解义
	 * $table  string    表名
	 * $where  string    查询条件 不填默认为1
	 *
	 * 返回值  array 二维
	 * */
	function select($table,$where=1){
		$sql="select * from $table where $where";
		return $this->readexecute($sql);
	}
	/*
	 * 多表查询 selectmore
	 *
	 * 参数    类型                                      解义
	 * $table  string                                   表名
	 * $join   string例如（ a inner join b on  a.id=b.id）
	 * $where  string    查询条件                  不填默认为1
	 *
	 * 返回值  array 二维
	 * */
	function selectmore($table,$join,$where=1){
		$sql="select * from $table $join  where $where";
		return $this->readexecute($sql);
	}
	/*
	 * 单表分页 page
	 *
	 * 参数    类型      解义
	 * $table  string    表名
	 * $offset string    偏移量
	 * $length num       分页长度
	 * $where  string    查询条件 不填默认为1
	 *
	 * 返回值  array 二维
	 * */
	function page($table,$offset,$length,$where=1){
		$sql="select * from $table where $where limit $offset,$length ";
		return $this->readexecute($sql);
	}
	/*
	 * 多表分页 pagemore
	 *
	 * 参数    类型      解义
	 * $table  string    表名
	 * $join   string例如（ a inner join b on  a.id=b.id）
	 * $offset string    偏移量
	 * $length num       分页长度
	 * $where  string    查询条件 不填默认为1
	 *
	 * 返回值  array 二维
	 * */
	function pagemore($table,$join,$offset,$length,$where=1){
		$sql="select * from $table $join limit $offset,$length where $where";
		return $this->readexecute($sql);
	}
	/*
	 * 删除 delete
	 *
	 * 参数    类型      解义
	 * $table  string    表名
	 * $where  string    查询条件 不填默认为1
	 *
	 * 返回值  bool
	 * */
	function delete($table,$where=0){
		$sql="delete from $table where $where";
		return $this->changeexecute($sql);
	}
	/*
	 * 批量删除 deletemore
	 *
	 * 参数    类型      解义
	 * $table  string    表名
	 * $str    string    条件字段
	 * $num    string    字段主键
	 *
	 * 返回值  bool
	 * */
	function deletemore($table,$str,$num){
		$sql="delete from $table where $str in ($num)";
		return $this->changeexecute($sql);
	}
	/*
	 * 修改 update
	 *
	 * 参数    类型                      解义
	 * $table  string                   表名
	 * $arr    array 例如array('id'=>1) 要修改的字段
	 * $where  string                   查询条件 不填默认为1
	 *
	 * 返回值  bool
	 * */
	function update($table,$arr,$where=1){
		$value="";
		foreach($arr as $k=>$v){
			$value.=$k."="."'$v',";
		}
		$value=rtrim($value,",");
		$sql="update $table set $value where $where";
		return $this->changeexecute($sql);
	}
	/*
	 *批量修改 updatemore
	 *
	 * 参数    类型                      解义
	 * $table  string                   表名
	 * $arr    array 例如array('id'=>1) 要修改的字段
	 * $str    string    条件字段
	 * $num    string    字段主键
	 *
	 * 返回值  bool
	 * */
	function updatemore($table,$arr,$str,$num){
		$value="";
		foreach($arr as $k=>$v){
			$value.=$k."="."'$v',";
		}
		$value=rtrim($value,",");
		$sql="update $table set $value where $str in ($num)";
		return $this->changeexecute($sql);
	}
	/*
	 * 修改字段自增 set
	 *
	 * 参数    类型                      解义
	 * $table  string                   表名
	 * $arr    array 例如array('id'=>1) 要修改的字段
	 * $where  string                   查询条件 不填默认为1
	 *
	 * 返回值  bool
	 * */
	function set($table,$arr,$where=1){
		$value="";
		foreach($arr as $k=>$v){
			$value.=$k."="."$v,";
		}
		$value=rtrim($value,",");
		$sql="update $table set $value where $where";
		return $this->changeexecute($sql);
	}
	/*
	 * 添加 insert
	 *
	 * 参数    类型                      解义
	 * $table  string                   表名
	 * $arr    array 例如array('id'=>1) 要修改的字段
	 *
	 * 返回值  bool
	 * */
	function insert($table,$arr){
		$data=$this::setdata($arr);
		$sql="insert into $table(".implode(",",$data['key']).") values(".implode(",",$data['value']).")";
		return $this->changeexecute($sql);
	}
	/*
	 * 批量添加 insertmore
	 *
	 * 参数    类型                      解义
	 * $table  string                   表名
	 * $arr    array 例如array(array('id'=>1),array('id'=>2)) 要修改的字段
	 *
	 * 返回值  bool
	 * */
	function insertmore($table,$arr){
		foreach($arr as $k=>$v){
			$data=$this::setdata($v);
			$value[]="(".implode(",",$data['value']).")";
		}
		foreach($arr['0'] as $k=>$v){
			$key[]=$k;
		}
		$sql="insert into $table(".implode(',',$key).") values ".implode(',',$value)."";
		return $this->changeexecute($sql);
	}
	/*
	 * 原生sql执行 exec
	 *
	 * 参数    类型            解义
	 * $sql    string          sql语句
	 *
	 * 返回值  bool
	 * */
	function exec($sql){
		return $this->changeexecute($sql);
	}
	/*
	 * 读取执行  readexecute
	 *
	 * 参数     类型    解义
	 * $sql     string  执行的sql语句
	 *
	 * 返回值   成功：资源 失败 false
	 * */
	function readexecute($sql){
		$result=$this->mysql->query($sql);
		if($result->rowCount()<1){
			return false;
		}
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	/*
	 * 改变执行  changeexecute
	 *
	 * 参数     类型    解义
	 * $sql     string  执行的sql语句
	 *
	 * 返回值   bool   成功：true 失败 false
	 * */
	function changeexecute($sql){
		if($this->mysql->exec($sql)){
			return true;
		}else{
			return false;
		}
	}
	/*
	 * 处理数组 setdata
	 *
	 * 参数     类型     解义
	 * $arr     array    要添加的数据
	 *
	 * 返回值  array
	 * */
	public static function setdata($arr){
		foreach($arr as $k=>$v){
			$data['key'][]=$k;
			$data['value'][]='\''.$v.'\'';
		}
		return $data;
	}
}
?>