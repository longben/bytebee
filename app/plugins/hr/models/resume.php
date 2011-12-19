<?php
class Resume extends HrAppModel {

	var $name = 'Resume';

	var $hasMany = array(
			'Family' => array('className' => 'Family',
								'foreignKey' => 'resume_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'dependent' => false
			),
			'Education' => array('className' => 'Education',
								'foreignKey' => 'resume_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'dependent' => false
			),
			'EmploymentRecord' => array('className' => 'EmploymentRecord',
								'foreignKey' => 'resume_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'dependent' => false
			)
	);

	//获取简历编号
	function getMaxResumeNo() {
		$ret = $this->query("select max(resume_no) as max_no from resumes");
		$maxResumeNo = $ret[0][0]['max_no'];
		if(empty($maxResumeNo)) {
			$maxResumeNo = '2001000001';
		}else{
			$maxResumeNo = $maxResumeNo + 1;
		}
		return $maxResumeNo;
	}


	function afterSave(){
		
		$resume_id = $this->getLastInsertID();

		/* 关联保存简历家庭成员信息 */
		if ($resume_id && !empty($this->data['Resume']['name1'])){
			$this->Family->create();
			$data['Family']['resume_id']       = $this->getMaxResumeNo();
			$data['Family']['name']            = $this->data['Resume']['name1'];
			$data['Family']['age']             = $this->data['Resume']['age1']; 
			$data['Family']['relation']        = $this->data['Resume']['relation1']; 
			$data['Family']['work_unit']       = $this->data['Resume']['work_unit1']; 
			$data['Family']['occupation']      = $this->data['Resume']['occupation1'];
			$data['Family']['contact_phone']   = $this->data['Resume']['contact_phone1'];
			$data['Family']['current_address'] = $this->data['Resume']['current_address1']; 
			$this->Family->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['name2'])){
			$this->Family->create();
			$data['Family']['resume_id']       = $this->getMaxResumeNo();
			$data['Family']['name']            = $this->data['Resume']['name2'];
			$data['Family']['age']             = $this->data['Resume']['age2']; 
			$data['Family']['relation']        = $this->data['Resume']['relation2']; 
			$data['Family']['work_unit']       = $this->data['Resume']['work_unit2']; 
			$data['Family']['occupation']      = $this->data['Resume']['occupation2'];
			$data['Family']['contact_phone']   = $this->data['Resume']['contact_phone2'];
			$data['Family']['current_address'] = $this->data['Resume']['current_address2']; 
			$this->Family->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['name3'])){
			$this->Family->create();
			$data['Family']['resume_id']       = $this->getMaxResumeNo();
			$data['Family']['name']            = $this->data['Resume']['name3'];
			$data['Family']['age']             = $this->data['Resume']['age3']; 
			$data['Family']['relation']        = $this->data['Resume']['relation3']; 
			$data['Family']['work_unit']       = $this->data['Resume']['work_unit3']; 
			$data['Family']['occupation']      = $this->data['Resume']['occupation3'];
			$data['Family']['contact_phone']   = $this->data['Resume']['contact_phone3'];
			$data['Family']['current_address'] = $this->data['Resume']['current_address3']; 
			$this->Family->save($data);
		}

		/* 关联保存简历教育及培训信息 */
		if ($resume_id && !empty($this->data['Resume']['training_bodies1'])){
			$this->Education->create();
			$data['Education']['resume_id']       = $this->getMaxResumeNo();
			$data['Education']['training_bodies'] = $this->data['Resume']['training_bodies1'];
			$data['Education']['start_date']      = $this->data['Resume']['start_date1']; 
			$data['Education']['end_date']        = $this->data['Resume']['end_date1']; 
			$data['Education']['major']           = $this->data['Resume']['major1']; 
			$data['Education']['degree']          = $this->data['Resume']['degree1'];
			$this->Education->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['training_bodies2'])){
			$this->Education->create();
			$data['Education']['resume_id']       = $this->getMaxResumeNo();
			$data['Education']['training_bodies'] = $this->data['Resume']['training_bodies2'];
			$data['Education']['start_date']      = $this->data['Resume']['start_date2']; 
			$data['Education']['end_date']        = $this->data['Resume']['end_date2']; 
			$data['Education']['major']           = $this->data['Resume']['major2']; 
			$data['Education']['degree']          = $this->data['Resume']['degree2'];
			$this->Education->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['training_bodies3'])){
			$this->Education->create();
			$data['Education']['resume_id']       = $this->getMaxResumeNo();
			$data['Education']['training_bodies'] = $this->data['Resume']['training_bodies3'];
			$data['Education']['start_date']      = $this->data['Resume']['start_date3']; 
			$data['Education']['end_date']        = $this->data['Resume']['end_date3']; 
			$data['Education']['major']           = $this->data['Resume']['major3']; 
			$data['Education']['degree']          = $this->data['Resume']['degree3'];
			$this->Education->save($data);
		}

		/* 关联保存简历最后工作经历信息 */
		if ($resume_id && !empty($this->data['Resume']['last_employer'])){
			$this->EmploymentRecord->create();
			$data['EmploymentRecord']['resume_id']           = $this->getMaxResumeNo();
			$data['EmploymentRecord']['last_employer']       = $this->data['Resume']['last_employer'];
			$data['EmploymentRecord']['position']            = $this->data['Resume']['position']; 
			$data['EmploymentRecord']['current_salary']      = $this->data['Resume']['current_salary']; 
			$data['EmploymentRecord']['from_date']           = $this->data['Resume']['from_date']; 
			$data['EmploymentRecord']['to_date']             = $this->data['Resume']['to_date'];
			$data['EmploymentRecord']['referee_name']        = $this->data['Resume']['referee_name']; 
			$data['EmploymentRecord']['number_of_employees'] = $this->data['Resume']['number_of_employees']; 
			$data['EmploymentRecord']['responsibilities']    = $this->data['Resume']['responsibilities']; 
			$data['EmploymentRecord']['reason_for_leaving']  = $this->data['Resume']['reason_for_leaving'];
			$this->EmploymentRecord->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['last_employer2'])){
			$this->EmploymentRecord->create();
			$data['EmploymentRecord']['resume_id']           = $this->getMaxResumeNo();
			$data['EmploymentRecord']['last_employer']       = $this->data['Resume']['last_employer2'];
			$data['EmploymentRecord']['position']            = $this->data['Resume']['position2']; 
			$data['EmploymentRecord']['current_salary']      = $this->data['Resume']['current_salary2']; 
			$data['EmploymentRecord']['from_date']           = $this->data['Resume']['from_date2']; 
			$data['EmploymentRecord']['to_date']             = $this->data['Resume']['to_date2'];
			$data['EmploymentRecord']['referee_name']        = $this->data['Resume']['referee_name2']; 
			$data['EmploymentRecord']['number_of_employees'] = $this->data['Resume']['number_of_employees2']; 
			$data['EmploymentRecord']['responsibilities']    = $this->data['Resume']['responsibilities2']; 
			$data['EmploymentRecord']['reason_for_leaving']  = $this->data['Resume']['reason_for_leaving2'];
			$this->EmploymentRecord->save($data);
		}

		if ($resume_id && !empty($this->data['Resume']['last_employer3'])){
			$this->EmploymentRecord->create();
			$data['EmploymentRecord']['resume_id']           = $this->getMaxResumeNo();
			$data['EmploymentRecord']['last_employer']       = $this->data['Resume']['last_employer3'];
			$data['EmploymentRecord']['position']            = $this->data['Resume']['position3']; 
			$data['EmploymentRecord']['current_salary']      = $this->data['Resume']['current_salary3']; 
			$data['EmploymentRecord']['from_date']           = $this->data['Resume']['from_date3']; 
			$data['EmploymentRecord']['to_date']             = $this->data['Resume']['to_date3'];
			$data['EmploymentRecord']['referee_name']        = $this->data['Resume']['referee_name3']; 
			$data['EmploymentRecord']['number_of_employees'] = $this->data['Resume']['number_of_employees3']; 
			$data['EmploymentRecord']['responsibilities']    = $this->data['Resume']['responsibilities3']; 
			$data['EmploymentRecord']['reason_for_leaving']  = $this->data['Resume']['reason_for_leaving3'];
			$this->EmploymentRecord->save($data);
		}
	}

}
?>