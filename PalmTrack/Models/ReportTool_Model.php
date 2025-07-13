<?php
require_once 'Cores/Database.php';

class ReportTool_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data) {
    $report_id = (int)$data['report_id'];
    $tool_id = (int)$data['tool_id'];
    $sql = "INSERT INTO report_tools (report_id, tool_id) VALUES ($report_id, $tool_id)";
    $this->db->execute($sql);
}
public function insertTools($report_id, $tool_ids) {
    foreach ($tool_ids as $tool_id) {
        $tool_id = (int)$tool_id;
        $sql = "INSERT INTO report_tools (report_id, tool_id) VALUES ($report_id, $tool_id)";
        $this->db->execute($sql);
    }
}


}
