<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;
use think\Controller;

class DepartmentHeadTutor extends BaseController {

	public $pageSize = 7;
	
	public function index() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		
		if ($head['avator'] == "") {
        	$head['avatorIsEmpty'] = 1;
        }
        if ($head['avator'] != "") {
        	$head['avatorIsEmpty'] = 0;
        }

		$this->assign('user', $head);
		return $this->fetch('index');
	}


	public function matchSetting($page=1) {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('chosen',0)->where('department',$user['department'])->page($page,$this->pageSize)->select();


		for ($i=0; $i <count($student) ; $i++) { 
			$voluntary[$i] = Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid',$student[$i]['sid'])->find();
			$voluntary[$i]['information'] = Db::table('user_student_'.$grade[0]['grade'])->where('sid',$student[$i]['sid'])->field('sid,field,serialNum,name')->find();

			$voluntary[$i]['firstTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishFirst'])->field('name')->find();
			$voluntary[$i]['secondTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishSecond'])->field('name')->find();
			$voluntary[$i]['thirdTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishThird'])->field('name')->find();
			$voluntary[$i]['forthTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishForth'])->field('name')->find();
			$voluntary[$i]['fifthTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishFifth'])->field('name')->find();
		}

		$teacher = Db::table('user_teacher')->where('department',$student[0]['department'])->select();
		for ($i=0; $i <count($teacher) ; $i++) { 
			$teacher[$i]['issue'] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$teacher[$i]['workNumber'])->find();

		}

		$total = count(Db::table('user_student_'.$grade[0]['grade'])->where('chosen',0)->where('department',$user['department'])->select());
		$totalPage = ceil($total/$this->pageSize);
		
		$teacherTotal = count($teacher);
		$teacherTotalPage = ceil($teacherTotal/$this->pageSize);

		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $this->pageSize,
			'curPage'   => $page
			];

		$teacherPageBar = [
			'teacherTotal'     => $teacherTotal,
			'teacherTotalPage' => $teacherTotalPage+1,
			'teacherPageSize'  => $this->pageSize,
			'teacherCurPage'   => $page
			];

		$this->assign($pageBar);
		$this->assign($teacherPageBar);
		$this->assign('student',$student);
		$this->assign('voluntary',$voluntary);
		$this->assign('teacher',$teacher);
		$this->assign('user', $user);
		return $this->fetch('match_setting');
				// dump($teacher);
			// dump($teacher);
			// dump($voluntary);
	}


	public function timeSetting() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$settingInfo = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		if (empty($settingInfo)) {
			$settingInfo['empty'] = 1;

			$settingInfo['voluntaryNum'] = 5;
			$settingInfo['totalMax'] = 8;
			$settingInfo['totalMin'] = 0;
			$settingInfo['defaultNum'] = 8;
			$settingInfo['experialMax'] = 5;

			$settingInfo['issueStart'] = NULL;
			$settingInfo['issueEnd'] = NULL;

			$settingInfo['firstStart'] = NULL;
			$settingInfo['firstEnd'] = NULL;

			$settingInfo['secondStart'] = NULL;
			$settingInfo['secondEnd'] = NULL;

			$settingInfo['confirmFirstStart'] = NULL;
			$settingInfo['confirmFirstEnd'] = NULL;

			$settingInfo['confirmSecondStart'] = NULL;
			$settingInfo['confirmSecondEnd'] = NULL;

		} else {
			$settingInfo['issueStart'] = date('Y-m-d H:i',$settingInfo['issueStart']);
			$settingInfo['issueEnd'] = date('Y-m-d H:i',$settingInfo['issueEnd']);

			$settingInfo['firstStart'] = date('Y-m-d H:i',$settingInfo['firstStart']);
			$settingInfo['firstEnd'] = date('Y-m-d H:i',$settingInfo['firstEnd']);

			$settingInfo['secondStart'] = date('Y-m-d H:i',$settingInfo['secondStart']);
			$settingInfo['secondEnd'] = date('Y-m-d H:i',$settingInfo['secondEnd']);

			$settingInfo['confirmFirstStart'] = date('Y-m-d H:i',$settingInfo['confirmFirstStart']);
			$settingInfo['confirmFirstEnd'] = date('Y-m-d H:i',$settingInfo['confirmFirstEnd']);

			$settingInfo['confirmSecondStart'] = date('Y-m-d H:i',$settingInfo['confirmSecondStart']);
			$settingInfo['confirmSecondEnd'] = date('Y-m-d H:i',$settingInfo['confirmSecondEnd']);

			$settingInfo['empty'] = 0;
		}

		$this->assign('settingInfo',$settingInfo);
		$this->assign('user', $head);
		return $this->fetch('time_setting');
		// dump($settingInfo);

	}

	public function infoSetting() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$userExist = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		$request = Request::instance();
		if ($request->isPost()) {
			$info = $request->post();

			$data['workNumber'] = $user['workNumber'];
			$data['voluntaryNum'] = $info['voluntaryNum'];

			$data['issueStart'] = strtotime($info['issueStart']);
			$data['issueEnd'] = strtotime($info['issueEnd']);

			$data['firstStart'] = strtotime($info['firstStart']);
			$data['firstEnd'] = strtotime($info['firstEnd']);

			$data['secondStart'] = strtotime($info['secondStart']);
			$data['secondEnd'] = strtotime($info['secondEnd']);

			$data['confirmFirstStart'] = strtotime($info['confirmFirstStart']);
			$data['confirmFirstEnd'] = strtotime($info['confirmFirstEnd']);

			$data['confirmSecondStart'] = strtotime($info['confirmSecondStart']);
			$data['confirmSecondEnd'] = strtotime($info['confirmSecondEnd']);

			$data['totalMax'] = $info['totalMax'];
			$data['totalMin'] = $info['totalMin'];
			$data['defaultNum'] = $info['defaultNum'];
			$data['experialMax'] = $info['experialMax'];

			if (empty($userExist)) {
				if (Db::table('tc_voluntaryinfosetting')->insert($data)) {
					$this->success("时间设置成功",url('timeSetting'));
				} else {
					$this->error("时间设置失败，请重新设置",url('timeSetting'));
				}
			} else {
				if (Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->update($data)) {
					$this->success("时间更新成功",url('timeSetting'));
				} else {
					$this->error("时间更新失败，请重新更新",url('timeSetting'));
				}
			}
			// dump($data);
			// dump($info);
		}
	}



	public function allocStudent() {
		$request = Request::instance();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		if ($request->isPost()) {
			$data = $request->post();

			Db::table('tc_result')->insert($data);
			Db::table('user_student_'.$grade[0]['grade'])->where('sid',$data['sid'])->setField('chosen',1);
			Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$data['workNumber'])->setInc('totalNow',1);
		}
		
	}


	//智能分配 —— 核心功能
	public function intelligentAlloc() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		//获取未分配到导师的学生信息
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('chosen',0)->where('department',$user['department'])->field('sid,serialNum,gpa,chosen')->select();
		$countStudent = count($student);

		for ($i=0; $i <$countStudent ; $i++) {
			//获取每个学生的志愿信息 
			$student[$i]['voluntary'] = Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid', $student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();

			//将每个学生的志愿信息转换成规定格式的txt文件
			$inputStudent[$i] = $student[$i]['serialNum'] . ' ' . $student[$i]['gpa'] . PHP_EOL . $student[$i]['voluntary']['wishFirst'] . PHP_EOL . $student[$i]['voluntary']['wishSecond'] . PHP_EOL . $student[$i]['voluntary']['wishThird'] . PHP_EOL . $student[$i]['voluntary']['wishForth'] . PHP_EOL . $student[$i]['voluntary']['wishFifth'] . PHP_EOL . PHP_EOL;
		}
		//将获取的学生信息转换为.txt文件
        file_put_contents('student.txt', $inputStudent);

        //获取导师信息
        if ($user['department'] == "计算机实验班") {
        	$isExperial = 1;
        	$teacher = Db::table('user_teacher')->where('isExperial',$isExperial)->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的计算机实验班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalCompExper'] - $teacherIssue[$i]['compExperNow'];

        		//将每个导师的信息转换成规定格式的txt文件
        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        } elseif ($user['department'] == "数学实验班") {
        	$isExperial = 2;
        	$teacher = Db::table('user_teacher')->where('isExperial',$isExperial)->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的数学实验班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalMathExper'] - $teacherIssue[$i]['mathExperNow'];

        		//将每个导师的信息转换成规定格式的txt文件
        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        } else {
        	$isExperial = 0;
        	$teacher = Db::table('user_teacher')->where('isExperial',$isExperial)->where('department',$user['department'])->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的自然班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalNatur'] - $teacherIssue[$i]['naturNow'];

        		//将每个导师的信息转换成规定格式的txt文件
        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        }
        //将获取的老师信息转换为.txt文件
        file_put_contents('teacher.txt', $inputTeacher);

        //调用算法进行分配
        $fileNameWithParam = 'distribute.exe ' . $countStudent . ' ' . $countTeacher;
        system($fileNameWithParam);

        $studentElected = file_get_contents('student_elected.txt');      //获取通过算法得到分配的学生的结果，转换为string
        $studentUnelected = file_get_contents('student_unelected.txt');  //获取通过算法仍然未得到分配的学生的结果，转换为string
        $tutorAssign = file_get_contents('tutor_assign.txt');            //获取通过算法，生成的导师对应学生的结果，转换为string

        //分割studentElected字符串，转换为数组
        if ($studentElected != "") {
	        $studentElected = str_replace("\r\n", '', $studentElected);
	        $studentElectedArr = explode(',', $studentElected);
	        for ($i = 0; $i < count($studentElectedArr); $i++) {
	            $studentElectedArr[$i] = explode(' ', $studentElectedArr[$i]);

	            $studentElectedResult[$i]['serialNum'] = $studentElectedArr[$i][0];
	            $studentElectedResult[$i]['sid'] = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum', $studentElectedResult[$i]['serialNum'])->field('sid')->find();
	            $studentElectedResult[$i]['sname'] = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum', $studentElectedResult[$i]['serialNum'])->field('name')->find();
	            $studentElectedResult[$i]['workNumber'] = $studentElectedArr[$i][1];
	            $studentElectedResult[$i]['tname'] = Db::table('user_teacher')->where('workNumber', $studentElectedResult[$i]['workNumber'])->field('name')->find();
	        }
	        $this->assign('studentElectedResult', $studentElectedResult);
	    }

        //分割studentUnlected字符串，转换为数组
        if ($studentUnelected != "") {
	        $studentUnelected = str_replace("\r\n", '', $studentUnelected);
	        $studentUnelectedArr = explode(',', $studentUnelected);
	        for ($i = 0; $i < count($studentUnelectedArr); $i++) {
	            $studentUnelectedArr[$i] = explode(' ', $studentUnelectedArr[$i]);

	            $studentUnelectedResult[$i]['serialNum'] = $studentUnelectedArr[$i][0];
	        }
	        $this->assign('studentUnelectedResult', $studentUnelectedResult);
	    }

        //分割tutorAssign字符串，转换为数组
        if ($tutorAssign != "") {
	        $tutorAssign = str_replace("\r\n", '', $tutorAssign);
	        $tutorAssignArr = explode(',', $tutorAssign);
	        for ($i = 0; $i < count($tutorAssignArr); $i++) {
	            $tutorAssignArr[$i] = explode(' ', $tutorAssignArr[$i]);

	            $tutorAssignResult[$i]['workNumber'] = $tutorAssignArr[$i][0];
	            $tutorAssignResult[$i]['count'] = $tutorAssignArr[$i][1];
	            $tutorAssignResult[$i]['avaliableNumber'] = $tutorAssignArr[$i][2];
	            if ($tutorAssignArr[$i][3] == "null") {
	                $tutorAssignResult[$i]['student'] = null;
	            } else {
	                $tutorAssignResult[$i]['student'] = $tutorAssignArr[$i][3];

	                $tutorAssignResult[$i]['student'] = explode('-', $tutorAssignResult[$i]['student']);
	            }
	        }
	        $this->assign('tutorAssignResult', $tutorAssignResult);
	    }

        $this->assign('user', $user);
        // return $this->fetch('assign_result');

	}  


	public function assignResult() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		//获取学生信息
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('chosen',0)->where('department',$user['department'])->field('sid,serialNum,gpa,chosen')->select();
		$countStudent = count($student);

		for ($i=0; $i <$countStudent ; $i++) { 
			$student[$i]['voluntary'] = Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid',$student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();

			$inputStudent[$i] = $student[$i]['serialNum'].' '.$student[$i]['gpa'].PHP_EOL.$student[$i]['voluntary']['wishFirst'].PHP_EOL.$student[$i]['voluntary']['wishSecond'].PHP_EOL.$student[$i]['voluntary']['wishThird'].PHP_EOL.$student[$i]['voluntary']['wishForth'].PHP_EOL.$student[$i]['voluntary']['wishFifth'].PHP_EOL.PHP_EOL;
		}
		//将获取的学生信息转换为.txt文件
		file_put_contents('student.txt', $inputStudent);

		//获取导师信息
		$teacher = Db::table('user_teacher')->where('department',$user['department'])->select();
		$countTeacher = count($teacher);


		for ($i=0; $i <$countTeacher ; $i++) {
			$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$teacher[$i]['workNumber'])->find(); 
			$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalNatur'] - $teacherIssue[$i]['nowNatur'];

			$inputTeacher[$i] = $teacher[$i]['workNumber'].' '.$teacher[$i]['avaliableNumber'].PHP_EOL;
		}
		//将获取的老师信息转换为.txt文件
		file_put_contents('teacher.txt', $inputTeacher);

		//调用算法进行分配
		$fileNameWithParam = 'distribute.exe '.$countStudent.' '.$countTeacher;
		system($fileNameWithParam);

		$studentElected = file_get_contents('student_elected.txt');      //获取通过算法得到分配的学生的结果，转换为string
		$studentUnelected = file_get_contents('student_unelected.txt');  //获取通过算法仍然未得到分配的学生的结果，转换为string
		$tutorAssign = file_get_contents('tutor_assign.txt');            //获取通过算法，生成的导师对应学生的结果，转换为string

		//分割studentElected字符串，转换为数组
		$studentElected = str_replace("\r\n", '', $studentElected);
		$studentElectedArr = explode(',', $studentElected);
		for ($i=0; $i <count($studentElectedArr) ; $i++) { 
			$studentElectedArr[$i] = explode(' ', $studentElectedArr[$i]);

			$studentElectedResult[$i]['serialNum'] = $studentElectedArr[$i][0];
			$studentElectedResult[$i]['sid'] = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$studentElectedResult[$i]['serialNum'])->field('sid')->find();
			$studentElectedResult[$i]['sname'] = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$studentElectedResult[$i]['serialNum'])->field('name')->find();
			$studentElectedResult[$i]['workNumber'] = $studentElectedArr[$i][1];
			$studentElectedResult[$i]['tname'] = Db::table('user_teacher')->where('workNumber',$studentElectedResult[$i]['workNumber'])->field('name')->find();
		}

		//分割studentUnlected字符串，转换为数组
		$studentUnelected = str_replace("\r\n", '', $studentUnelected);
		$studentUnelectedArr = explode(',', $studentUnelected);
		for ($i=0; $i <count($studentUnelectedArr) ; $i++) { 
			$studentUnelectedArr[$i] = explode(' ', $studentUnelectedArr[$i]);

			$studentUnelectedResult[$i]['serialNum'] = $studentUnelectedArr[$i][0];
		}

		//分割tutorAssign字符串，转换为数组
		$tutorAssign = str_replace("\r\n", '', $tutorAssign);
		$tutorAssignArr = explode(',', $tutorAssign);
		for ($i=0; $i <count($tutorAssignArr) ; $i++) { 
			$tutorAssignArr[$i] = explode(' ', $tutorAssignArr[$i]);

			$tutorAssignResult[$i]['workNumber'] = $tutorAssignArr[$i][0];
			$tutorAssignResult[$i]['count'] = $tutorAssignArr[$i][1];
			$tutorAssignResult[$i]['avaliableNumber'] = $tutorAssignArr[$i][2];
			if ($tutorAssignArr[$i][3] == "null") {
				$tutorAssignResult[$i]['student'] = null;
			} else {
				$tutorAssignResult[$i]['student'] = $tutorAssignArr[$i][3];

				$tutorAssignResult[$i]['student'] = explode('-', $tutorAssignResult[$i]['student']);
			}
		}

		// dump($tutorAssignResult);
		$this->assign('studentElectedResult',$studentElectedResult);
		$this->assign('user', $user);
		return $this->fetch('assign_result');

		// return json($studentElectedResult); //返回通过算法得到分配的学生的JSON
		// return json($studentUnelectedResult); //获取通过算法仍然未得到分配的学生的JSON
		// dump($tutorAssignArr);
		// dump($tutorAssignResult);



		$this->assign('user', $user);
		return $this->fetch('assign_result');
	}

//
//	public function assignResult() {
//		$user = $this->auto_login();
//
//		$this->assign('user', $user);
//		return $this->fetch('assign_result');
//	}


	public function assignResultConfirm($r) {
		dump($r);
	}



	//测试调用算法
	public function cTest() {
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$data = Db::table('user_student_'.$grade[0]['grade'])->select();
		return json($data);
	}


	public function modify() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();

		if ($head['avator'] == "") {
        	$head['avatorIsEmpty'] = 1;
        }
        if ($head['avator'] != "") {
        	$head['avatorIsEmpty'] = 0;
        }

		$this->assign('user', $head);
		return $this->fetch('modify');
	}

	public function saveModify() {
		$user = $this->auto_login();
		$where['workNumber'] = $user['workNumber'];
		$request = Request::instance();

		//获取上传的头像的信息
		$avator = request()->file('avator');
		if ($avator != "") {
			$avatorInfo = $avator->move('../uploads/departmentHead');
			if ($avatorInfo) {
				$temp['ava'] = explode("..", $avatorInfo->getPathName());
				$data['avator'] = $temp['ava'][1];
			}
		}

		if ($request->isPost()) {
			$password = $request->post('newPasswordConfirm');
			if ($password == "") {
				$data['password'] = $request->post('oldPassword');
			} else {
				$data['password'] = $request->post('newPasswordConfirm');
			}

			$data['telephone'] = $request->post('telephone');
			$data['email'] = $request->post('email');

			if (Db::table('user_department_head')->where($where)->update($data)) {
				$this->success("信息修改成功!",url('index'));
			} else {
				$this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
			}
		}

	}

	public function oldPasswordConfirm() {
		$user = $this->auto_login();
        $head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();

        $request = Request::instance();
        if ($request->isPost()) {
            $oldPassword = $request->post();
            if ($oldPassword['oldPW'] != $head['password']) {
                $data = false;
            }
            if ($oldPassword['oldPW'] == $head['password']) {
                $data = true;
            }
        return json($data);
        }
	}

	public function studentManager(){
        $user = $this->auto_login();
	    return $this->fetch('student_manager');
    }


    public function addStudent() {
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$student = $request->post();
    		$student['password'] = $student['serialNum'];

    		if (Db::table('user_student_'.$student['grade'])->insert($student)) {
    			return true;
    		} else {
    			return false;
    		}
    	}
    }

    public function deleteStudent() {
    	$request = Request::instance();
    	if ($request->isGet()) {
    		$data = $request->get();
    		$grade = $data['grade'];
    		$serialNum = $data['serialNum'];

    		if (Db::table('user_student_'.$grade)->where('serialNum','in',$serialNum)->delete()) {
    			return true;
    		} else {
    			return false;
    		}
    	}
    }

    public function studentList() {
//	   	$user = $this->auto_login();

//	   	$department = $user['department'];
    	$lastGrade = Db::table('tc_grade')->order('grade desc')->select();
    	$pageSize = 10;

    	$request = Request::instance();
    	if ($request->isGet()) {
    		$grade = $request->get('grade') != '' ? $request->get('grade') : $lastGrade[0]['grade'];
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		$totalPage = ceil(count(Db::table('user_student_'.$grade)->where('department',"信息安全与网络工程系")->select())/$pageSize);
    		$studentList['amount'] = $totalPage;
    		$studentList['information'] = Db::table('user_student_'.$grade)->where('department',"信息安全与网络工程系")->field('sid,serialNum,name,department,grade,gpa,rank')->page($curPage,$pageSize)->select();
    		return json($studentList);
    	}
    }

    public function teacherList() {
    	$user = $this->auto_login();

    	$pageSize = 10;

    	$request = Request::instance();
    	if ($request->isGet()) {
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		$teacherList['amount'] = count(Db::table('user_teacher')->where('department',$user['department'])->select());
    		$teacherList['information'] = Db::table('user_teacher')->where('department',$user['department'])->field('workNumber,name,sex')->page($curPage,$pageSize)->select();
    		return json($teacherList);
    	}
    }


    public function gradeList() {
    	$request = Request::instance();

    	if ($request->isGet()) {
    		$gradeList = Db::table('tc_grade')->limit(5)->select();

    		return json($gradeList);
    	}
    }
}
