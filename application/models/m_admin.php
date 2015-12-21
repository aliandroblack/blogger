<?php
class M_admin extends CI_Model{	
    public $table_record_count;
     
	function kategori(){
		return $this->db->get('kategori')->result();
	}
	function tambah_kategori($data){
		$this->db->insert('kategori',$data);		
	}
	function edit_kategori($id){
		$this->db->where('id',$id);
		return $this->db->get('kategori')->result();
	}
	function update_kategori($id,$data){
		$this->db->where('id',$id);
		$this->db->update('kategori',$data);
	}
	function hapus_kategori($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
	}
	function artikel(){
	    return $this->db->query("select * from artikel,kategori,users where artikel.kategori=kategori.id and users.id=artikel.author")->result();
	}
	function artikel_act($data){
	    $this->db->insert('artikel',$data);
	}
	function edit_artikel($id){
	    $this->db->where('id_artikel',$id);
	    return $this->db->get('artikel')->result();
	}
	function update_artikel($data,$id){
	    $this->db->where('id_artikel',$id);
	    $this->db->update('artikel',$data);
	}
	function hapus_artikel($id){
	    $this->db->where('id_artikel',$id);
	    $this->db->delete('artikel');
	}

	function pengaturan(){
	    return $this->db->get('pengaturan')->result();
	}
	function update_pengaturan($data){
	    $this->db->update('pengaturan',$data);
	}

	function lihat_pengaturan($where){
	    $this->db->select($where);
	    return $this->db->get('pengaturan')->result();
	}
	function tutorial_perkategori($id){
	    return $this->db->query("select * from artikel where kategori = '$id'")->num_rows();
	}
	
	function single($id){
	    return $this->db->query("select * from artikel,users,kategori where artikel.id_artikel='$id' and artikel.kategori=kategori.id and artikel.author=users.id")->result();
	}
	
	function artikel_kategori($id){
	    $this->db->where('kategori',$id);
	    return $this->db->get('artikel')->result();
	}
 function guestbook()
    {
       return $this->db->get('guestbook')->result();
    }

    function findAll($fields=NULL,$start = NULL, $count = NULL)
    {
        return $this->find($fields,NULL, NULL,$start, $count);
    }

    function findByFilter($filter_rules, $start = NULL, $count = NULL)
    {
        return $this->find(NULL,$filter_rules, NULL,$start, $count);
    }

    function find($fields=NULL, $filters = NULL, $order=NULL, $start = NULL, $count = NULL)
    {
        $results = array();
        //finding number of search
        $this->_set_where($filters);
        $this->db->from('guestbook');
        $this->table_record_count = $this->db->count_all_results();

        //the real result
        $this->_set_where($filters);
        $order=array("tanggal"=>"desc");
        $this->_set_order($order);


        if ($start)
        {
            if ($count)
                $this->db->limit($start, $count);
            else
                $this->db->limit($start);
        }
        $query = $this->db->get( 'guestbook' );
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    function add( $data )
    {
        $this->db->insert('guestbook', $data);
        return $this->db->insert_id();
    }

    function update($keyvalue, $data)
    {
        $this->db->where('id', $keyvalue);
        $this->db->update('guestbook', $data);
    }

    function delete($idField)
    {
        $this->db->where('id', $idField);
        $this->db->delete('guestbook');
        return true;
    }

    function _set_where($filters=NULL)
    {
        if ($filters)
        {
            if ( is_string($filters) )
            {
                $where_clause = $filters;
                $this->db->where($where_clause);
            }
            elseif ( is_array($filters) )
            {
                if ( count($filters) > 0 )
                {
                    foreach ($filters as $field => $value)
                        $this->db->where($field, $value);
                }
            }

        }
    }
    function _set_order($order=NULL)
    {
        if ($order)
        {
            if ( is_string($order) )
            {
                $where_clause = $order;
                $this->db->order_by($where_clause);
            }
            elseif ( is_array($order) )
            {
                if ( count($order) > 0 )
                {
                    foreach ($order as $field => $value)
                        $this->db->order_by($field, $value);
                }
            }

        }
    }
}