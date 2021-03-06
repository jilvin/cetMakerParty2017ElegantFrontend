<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PartyData extends CI_Model
{
  function __construct()
  {
    $this->tableName = 'partydata';
    $this->primaryKey = 'id';
  }

public function checkPartyExists()
{
  $this->db->select($this->primaryKey);
  $this->db->from($this->tableName);
  $prevQuery = $this->db->get();
  $prevCheck = $prevQuery->num_rows();

  if($prevCheck > 0)
  {
    // party exists
    return "1";
  }
  else
  {
    // party does not exist
    return "0";
  }
}

public function getCurrentPartyID()
{
  return 1;
}

public function getPartyDate($partyID)
{
  $this->db->from($this->tableName);
  $this->db->where(array('id' => $partyID));
  $prevQuery = $this->db->get();
  $prevCheck = $prevQuery->num_rows();

  if($prevCheck > 0)
  {
    // echo serialize($prevQuery->result_array()[0]['partytime']);
    $timestamp = $prevQuery->result_array()[0]['partytime'];
    $convertedTimestamp = date_format(date_create($timestamp), 'F d Y');
    // echo $convertedTimestamp;
    return $convertedTimestamp;
  }
  else
  {
    return NULL;
  }
}
  // public function checkUser($data = array())
  // {
  //   $this->db->select($this->primaryKey);
  //   $this->db->from($this->tableName);
  //   $this->db->where(array('email'=>$data['email']));
  //   $prevQuery = $this->db->get();
  //   $prevCheck = $prevQuery->num_rows();
  //
  //   if($prevCheck > 0)
  //   {
  //     $prevResult = $prevQuery->row_array();
  //     $data['modified'] = date("Y-m-d H:i:s");
  //     //additional by jilvin -- start
  //     //additional by jilvin -- end
  //     $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
  //     $userID = $prevResult['id'];
  //   }
  //   else
  //   {
  //     $data['created'] = date("Y-m-d H:i:s");
  //     $data['modified'] = date("Y-m-d H:i:s");
  //     //additional by jilvin -- start
  //     // $data['level'] = '0';
  //     // $data['levelcheckintime'] = date("Y-m-d H:i:s");
  //     //additional by jilvin -- end
  //     $insert = $this->db->insert($this->tableName,$data);
  //     $userID = $this->db->insert_id();
  //   }
  //
  //   return $userID?$userID:FALSE;
  // }

  // public function returnLevel($id){
  //     $pid = $this->db->select('level')
  //     ->get_where('users', array('id' => $id))
  //     ->row()
  //     ->level;
  //
  //     return $pid;
  // }
  //
  // public function returnLevelCheckInTime($id){
  //     $pid = $this->db->select('levelcheckintime')
  //     ->get_where('users', array('id' => $id))
  //     ->row()
  //     ->levelcheckintime;
  //
  //     return $pid;
  // }
  //
  // public function returnCollegeName($id){
  //     $pid = $this->db->select('collegename')
  //     ->get_where('users', array('id' => $id))
  //     ->row()
  //     ->collegename;
  //
  //     return $pid;
  // }
  //
  // public function returnMobileNumber($id){
  //     $pid = $this->db->select('mobilenumber')
  //     ->get_where('users', array('id' => $id))
  //     ->row()
  //     ->mobilenumber;
  //
  //     return $pid;
  // }
  //
  // public function addLevel($id){
  //   $this->db->select($this->level,$this->primaryKey);
  //   $this->db->from($this->tableName);
  //   $this->db->where(array('id'=>$id));
  //   $prevQuery = $this->db->get();
  //   $prevCheck = $prevQuery->num_rows();
  //   $prevResult = $prevQuery->row_array();
  //
  //   $prevResult['level'] = $prevResult['level'] + 1;
  //   $prevResult['levelcheckintime'] = date("Y-m-d H:i:s");
  //     $update = $this->db->update($this->tableName,$prevResult,array('id'=>$id));
  // }
  //
  public function returnCheckValueAdditional($id)
  {
    // here we select just the age column
    // $this->db->select('collegename','mobilenumber');
    // $this->db->where('id',$id);
    // $q = $this->db->get('users');
    // $data = $q->result_array();
    // $z = isset($data[0]['collegename']) ? 1 : 0;
    //
    // return $z;
    return 1;
  }

  // public function checkEmailExist($email)
  // {
  //   $this->db->where('email', $email);
  //   $result = $this->db->get('users');
  //   $data = $result->result_array();
  //   if($result->num_rows() > 0)
  //   {
  //     /*
  //     * the email already exists
  //     * */
  //     if($data[0]['oauth_provider']=="google")
  //     {
  //       return '1g';
  //     }
  //     else
  //     {
  //       return '1f';
  //     }
  //   }
  //   else
  //   {
  //     return 0;
  //   }
  // }
  //
  // public function addMoreDetails($id,$collegename,$mobilenumber){
  //   $this->db->select($this->level,$this->primaryKey);
  //   $this->db->from($this->tableName);
  //   $this->db->where(array('id'=>$id));
  //   $prevQuery = $this->db->get();
  //   $prevCheck = $prevQuery->num_rows();
  //   $prevResult = $prevQuery->row_array();
  //
  //   $prevResult['collegename'] = $collegename;
  //   $prevResult['mobilenumber'] = $mobilenumber;
  //     $update = $this->db->update($this->tableName,$prevResult,array('id'=>$id));
  // }
  //
  // public function show_all_for_leaderboard()
  // {
  //   $query = $this->db->query("Select * from users ORDER BY LEVEL DESC, LEVELCHECKINTIME ASC;");
  //   return $query;
  // }
}
