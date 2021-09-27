<?php
class Ajax_pagination_model extends CI_Model
{
 function count_all()
 {
  $query = $this->db->get("questions");
  return $query->num_rows();
 }

 function fetch_details($limit, $start)
 {
  $output = '';
  $this->db->select("*");
  $this->db->from("questions");
  $this->db->order_by("id", "ASC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  $output .= '
  
  ';
  foreach($query->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->id.'</td>
    <td>'.$row->question.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  return $output;
 }
}

