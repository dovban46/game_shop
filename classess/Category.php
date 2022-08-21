<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

class Category
{
private $db;
private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function catInsert($catName){
		$catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);

if (empty($catName) ) {
	
	$msg = "<span class='error'>Поле категорії не повинно бути порожнім!</span>";
	return $msg;
		} else{
			$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$msg = "<span class='success'>Категорію успішно додано</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Категорія не додано</span>";
				return $msg;
			}
		}
	}
public function getAllCat(){

	$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
	$result = $this->db->select($query);
	return $result;
}

public function getCatById($id){
$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
	$result = $this->db->select($query);
	return $result;
}

public function catUpdate($catName,$id){

	$catName = $this->fm->validation($catName);
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $id = mysqli_real_escape_string($this->db->link, $id);

if (empty($catName) ) {
	
	$msg = "<span class='error'>Поле категорії не повинно бути порожнім!</span>";
	return $msg;
} else{

	$query = "UPDATE tbl_category
	SET
	catName = '$catName' 
	WHERE catId = '$id'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Катеорію оновлено</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Катеорію не оновлено</span>";
				return $msg;
	}
}
}
public function delcatById($id){

	$query = "DELETE FROM tbl_category WHERE catId = '$id'";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		$msg = "<span class='success'>Категорію успішно видалено</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Категорію не видалено</span>";
				return $msg;

	}
}
}
?>