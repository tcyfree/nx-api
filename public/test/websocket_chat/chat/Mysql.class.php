<?php

$config = [
	'host' => 'rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com',
	'username' => 'qxd',
	'password' => 'Nuanxiang17413$cj',
	'database' => 'qxd',
];

class Mysql
{
 private $mysqli;
 private $result;
 private $limit;
 private $order;
 /**
  * 数据库连接
  * @param $config 配置数组
  */
 public function __construct($config)
 {
	$host = $config['host']; //主机地址
	$username = $config['username'];//用户名
	$password = $config['password'];//密码
	$database = $config['database'];//数据库
	$port = isset($config['port']) ? $config['port'] : '3306'; //端口号
	$this->mysqli = new mysqli($host, $username, $password, $database, $port);

 }

 public function limit($limit){
	if($limit){
		$this->limit = ' limit ' . $limit;
	}
	return $this;
 }

  public function order($order){
	if($order){
		$this->order = ' order by ' . $order . ' ';
	}
	return $this;
 }
 /**
  * 数据查询
  * @param $table 数据表
  * @param null $field 字段
  * @param null $where 条件
  * @return mixed 查询结果数目
  */
 public function select($table, $field = [], $where = null)
 {
  $sql = "SELECT * FROM {$table}";
  if (!empty($field)) {
   $field = '`' . implode('`,`',$field) . '`';
   $sql = str_replace('*', $field, $sql);
  }
  if (!empty($where)) {
   $sql = $sql . ' WHERE ' . $where;
  }
  $sql .= $this->order;
  $sql .= $this->limit;
  $this->result = $this->mysqli->query($sql);
  return $this->fetchAll();
  //return $this->result->num_rows;
 }
 /**
  * @return mixed 获取全部结果
  */
 public function fetchAll()
 {
  return $this->result->fetch_all(MYSQLI_ASSOC);
 }
 /**
  * 插入数据
  * @param $table 数据表
  * @param $data 数据数组
  * @return mixed 插入ID
  */
 public function insert($table, $data)
 {
  foreach ($data as $key => $value) {
   $data[$key] = $this->mysqli->real_escape_string($value);
  }
  $keys = '`' . implode('`,`', array_keys($data)) . '`';
  $values ='\'' . implode("','", array_values($data)) . '\'';
  $sql = "INSERT INTO {$table}( {$keys} )VALUES( {$values} )";
  $this->mysqli->query($sql);
  return $this->mysqli->insert_id;
 }
 /**
  * 更新数据
  * @param $table 数据表
  * @param $data 数据数组
  * @param $where 过滤条件
  * @return mixed 受影响记录
  */
 public function update($table, $data, $where)
 {
  foreach ($data as $key => $value) {
   $data[$key] = $this->mysqli->real_escape_string($value);
  }
  $sets = array();
  foreach ($data as $key => $value) {
   $kstr ='`' .$key.'`';
   $vstr ='`' .$value . '\'';
   array_push($sets, $kstr . '=' . $vstr);
  }
  $kav = implode(',', $sets);
  $sql = "UPDATE {$table} SET {$kav} WHERE {$where}";
  $this->mysqli->query($sql);
  return $this->mysqli->affected_rows;
 }
 /**
  * 删除数据
  * @param $table 数据表
  * @param $where 过滤条件
  * @return mixed 受影响记录
  */
 public function delete($table, $where)
 {
  $sql = "DELETE FROM {$table} WHERE {$where}";
  $this->mysqli->query($sql);
  return $this->mysqli->affected_rows;
 }
}

?>