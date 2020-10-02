<?php

class DBManager {
    const SERVER_NAME = 'localhost';        
    const USER_NAME = 'root';
    const PASSWORD = '';
    const DATABASE_NAME = 'job_portal';
    
    
    public static function getConnection(){        
        $db = @mysqli_connect(self::SERVER_NAME, self::USER_NAME, self::PASSWORD, self::DATABASE_NAME) or die('<h3>The server is currently Down, Please try later.</h3>');
        //@mysqli_select_db(self::DATABASE_NAME,$conn)  or die('<h3>Database Error, Please Contact Administrator.</h3>');
        return $db;
    }
    public static function loginUser($userName,$password){
        $info = NULL;
        $db = self::getConnection();
        $query = "select * from users where UserName='$userName' and Password = '$password'";
        $result = mysqli_query($db,$query);    
        if($row = mysqli_fetch_assoc($result)){  
            $info = new UserInfo();
            $info->userName = $row["UserName"];
            $info->roleName = $row["RoleName"];
            $info->email = $row["Email"];
            $info->name = $row["Name"];
            $info->profileComplete = $row["ProfileComplete"];
        }
        mysqli_close($db);
        return $info;
    } 
    public static function registerUser($info){
        $db = self::getConnection();
        $userName = $info->userName;
        $password = $info->password;
        $email = $info->email;
        $roleName = $info->roleName;
        $name = $info->name;
        $secretQuestion = $info->secretQuestion;
        $answer = $info->answer;
        $query = "insert into users values('$userName','$password','$roleName','$email','$name','$secretQuestion','$answer',0)";
        mysqli_query($db,$query); 
        mysqli_close($db);
        return $info;
    }     
    public static function getJobSeeker($userName){
        $js = new JobSeeker();
        $db = self::getConnection();
        $query = "select * from job_seekers where UserName='$userName'";
        $result = mysqli_query($db,$query);    
        $row = mysqli_fetch_assoc($result); 
        $js->seekerId = $row["SeekerId"];
        $js->userName = $row["UserName"];
        $js->gender = $row["Gender"];
        $js->email = $row["Email"];
        $js->phone = $row["Phone"];
        $js->address = $row["Address"];
        $js->city = $row["City"];
        $js->country = $row["Country"];
        $js->qualification = $row["Qualification"];
        $js->experience = $row["Experience"];
        $js->objective = $row["Objective"];
        $js->skills = $row["Skills"];
        $js->bioData = $row["BioData"];
        $js->photo = $row["Photo"];
        $js->dateOfBirth = strtotime($row["DateOfBirth"]);
        $js->areaOfWork = $row["AreaOfWork"]; 
        mysqli_close($db);
        return $js;
    }
    public static function updateJobSeekerProfile($js){
        $db = self::getConnection();
        $email = $js->email;
        $phone = $js->phone;
        $address = $js->address;
        $city = $js->city;
        $country = $js->country;
        $qualification = $js->qualification;
        $experience = $js->experience;
        $objective = $js->objective;
        $skills = $js->skills;
        $areaOfWork = $js->areaOfWork;
        $userName = $js->userName;
        $query = "update job_seekers set Email='$email',Phone='$phone',Address='$address',City='$city',Country='$country',Qualification='$qualification',Experience='$experience',Objective='$objective',Skills='$skills',AreaOfWork='$areaOfWork' where UserName='$userName'";
        //echo $query;
        mysqli_query($db,$query);
        mysqli_close($db);
    }
    public static function addJobSeekerProfile($js){
        $db = self::getConnection();
        $gender = $js->gender;
        $email = $js->email;
        $phone = $js->phone;
        $dateOfBirth = date('Y-m-d',$js->dateOfBirth);
        $address = $js->address;
        $city = $js->city;
        $country = $js->country;
        $qualification = $js->qualification;
        $experience = $js->experience;
        $objective = $js->objective;
        $skills = $js->skills;
        $areaOfWork = $js->areaOfWork;
        $userName = $js->userName;
        $photo = 'seeker/'.$js->photo;
        $bioData = 'seeker/'.$js->bioData;
        $query = "insert into job_seekers(UserName,Gender,Email,Phone,DateOfBirth,Address,City,Country,Qualification,Experience,Objective,Skills,Biodata,Photo,AreaOfWork) values('$userName','$gender','$email','$phone','$dateOfBirth','$address','$city','$country','$qualification','$experience','$objective','$skills','$bioData','$photo','$areaOfWork')";
        //echo $query;
        mysqli_query($db,$query);
        $query = "update users set ProfileComplete=1 where UserName='$userName'";
        mysqli_query($db,$query);
        mysqli_close($db);
    }    
    public static function getJobProvider($providerId){
        $jp = NULL;
        $db = self::getConnection();
        $query = "select * from job_providers where ProviderId='$providerId'";
        $result = mysqli_query($db,$query);    
        $row = mysqli_fetch_assoc($result);  
        $jp = new JobProvider();
        $jp->providerId = $row["ProviderId"];
        $jp->userName = $row["UserName"];
        $jp->companyName = $row["CompanyName"];
        $jp->address = $row["Address"];
        $jp->city = $row["City"];
        $jp->country = $row["Country"];
        $jp->website = $row["Website"];
        $jp->hrname = $row["HRName"];
        $jp->hremail = $row["HREmail"];
        $jp->hrphone = $row["HRPhone"];
        $jp->logo = $row["Logo"];
        mysqli_close($db);
        return $jp;
    }
    public static function getProvider($userName){
        $jp = NULL;
        $db = self::getConnection();
        $query = "select * from job_providers where UserName='$userName'";
        $result = mysqli_query($db,$query);    
        $row = mysqli_fetch_assoc($result);  
        $jp = new JobProvider();
        $jp->providerId = $row["ProviderId"];
        $jp->userName = $row["userName"];
        $jp->companyName = $row["name"];
        $jp->address = $row["Address"];
        $jp->city = $row["City"];
        $jp->country = $row["Country"];
        $jp->website = $row["Website"];
        $jp->hrname = $row["HRName"];
        $jp->hremail = $row["HREmail"];
        $jp->hrphone = $row["HRPhone"];
        $jp->logo = $row["Logo"];
        mysqli_close($db);
        return $jp;
    }    
    public static function getJobProviders(){
        $list = array();
        $db = self::getConnection();
        $query = "select * from job_providers";
        $result = mysqli_query($db,$query);   
        while($row = mysqli_fetch_assoc($result)){  
            $jp = new JobProvider();
            $jp->providerId = $row["ProviderId"];
            $jp->userName = $row["UserName"];
            $jp->companyName = $row["CompanyName"];
            $jp->address = $row["Address"];
            $jp->city = $row["City"];
            $jp->country = $row["Country"];
            $jp->website = $row["Website"];
            $jp->hrname = $row["HRName"];
            $jp->hremail = $row["HREmail"];
            $jp->hrphone = $row["HRPhone"];
            $jp->logo = $row["Logo"];
            $list[] = $jp;
        }
        mysqli_close($db);
        return $list;
    } 
    public static function addJobProviderProfile($js){
        $db = self::getConnection();
        $address = $js->address;
        $city = $js->city;
        $country = $js->country;
        $hrname = $js->hrname;
        $hremail = $js->hremail;
        $hrphone = $js->hrphone;
        $website = $js->website;
        $userName = $js->userName;
        $companyName = $js->companyName;
        $logo = 'provider/'.$js->logo;
        $query = "insert into job_providers(UserName,CompanyName,Address,City,Country,Website,HRName,HREmail,HRPhone,Logo) values('$userName','$companyName','$address','$city','$country','$website','$hrname','$hremail','$hrphone','$logo')";
        mysqli_query($db,$query);
        $query = "update users set ProfileComplete=1 where UserName='$userName'";
        mysqli_query($db,$query);
        mysqli_close($db);
    }    
    public static function updateJobProviderProfile($js){
        $db = self::getConnection();
        $city = $js->city;
        $hrphone = $js->hrphone;
        $address = $js->address;
        $website = $js->website;
        $country = $js->country;
        $hrname = $js->hrname;
        $hremail = $js->hremail;
        $userName = $js->userName;
        $query = "update job_providers set Address='$address',HRPhone='$hrphone',Website='$website',City='$city',Country='$country',HRName='$hrname',HREmail='$hremail' where UserName='$userName'";
        //echo $query;
        mysqli_query($db,$query);
        mysqli_close($db);
    }
    public static function getJobs($areaOfWork){
        $list = array();
        $db = self::getConnection();
        $query = "select * from jobs where AreaOfWork='$areaOfWork'";
        $result = mysqli_query($db,$query);
        while($row = mysqli_fetch_assoc($result)){  
            $job = new Job();
            $job->jobId = $row["JobId"];
            $job->providerId = $row["ProviderId"];
            $job->areaOfWork = $row["AreaOfWork"];
            $job->post = $row["Post"];
            $job->jobDescription = $row["JobDescription"];
            $job->skillsRequired = $row["SkillsRequired"];
            $job->experienceRequired = $row["ExperienceRequired"];
            $job->jobLocation = $row["JobLocation"];
            $job->salary = $row["Salary"];
            $job->openDate = strtotime($row["OpenDate"]);
            $job->closeDate = strtotime($row["CloseDate"]);
            $list[] = $job;
        }
        mysqli_close($db);
        return $list;
    }
    public static function getJobsByLocation($areaOfWork,$location){
        $list = array();
        $db = self::getConnection();
        $query = "select * from jobs where AreaOfWork='$areaOfWork' and JobLocation like '%".$location."%'";
        //echo $query;
        $result = mysqli_query($db,$query); 
        while($row = mysqli_fetch_assoc($result)){  
            $job = new Job();
            $job->jobId = $row["JobId"];
            $job->providerId = $row["ProviderId"];
            $job->areaOfWork = $row["AreaOfWork"];
            $job->post = $row["Post"];
            $job->jobDescription = $row["JobDescription"];
            $job->skillsRequired = $row["SkillsRequired"];
            $job->experienceRequired = $row["ExperienceRequired"];
            $job->jobLocation = $row["JobLocation"];
            $job->salary = $row["Salary"];
            $job->openDate = strtotime($row["OpenDate"]);
            $job->closeDate = strtotime($row["CloseDate"]);
            $list[] = $job;
        }
        mysqli_close($db);
        return $list;
    }    
    public static function postJob($job){
        $db = self::getConnection();
        $jobId = $job->jobId;
        $providerId = $job->providerId;
        $areaOfWork = $job->areaOfWork;
        $post = $job->post;
        $jobDescription = $job->jobDescription;
        $skillsRequired = $job->skillsRequired;
        $experienceRequired = $job->experienceRequired;
        $jobLocation = $job->jobLocation;
        $salary = $job->salary;
        $openDate = date('Y-m-d',$job->openDate);
        $closeDate = date('Y-m-d',$job->closeDate);
        $query = "insert into jobs(ProviderId,AreaOfWork,Post,JobDescription,ExperienceRequired,SkillsRequired,JobLocation,Salary,OpenDate,CloseDate) values($providerId,'$areaOfWork','$post','$jobDescription','$experienceRequired','$skillsRequired','$jobLocation','$salary','$openDate','$closeDate')";
        //echo $query;
        mysqli_query($db,$query);    
        mysqli_close($db);
    } 
    public static function deleteJob($jobId){
        $db = self::getConnection();
        $query = "delete from jobs where jobId=$jobId";
        mysqli_query($db,$query);    
        mysqli_close($db);
    }    
    public static function getProviderJobs($providerId){
        $list = array();
        $db = self::getConnection();
        $query = "select * from jobs where ProviderId=$providerId";
        $result = mysqli_query($db,$query);    
        while($row = mysqli_fetch_assoc($result)){  
            $job = new Job();
            $job->jobId = $row["JobId"];
            $job->providerId = $row["ProviderId"];
            $job->areaOfWork = $row["AreaOfWork"];
            $job->post = $row["Post"];
            $job->jobDescription = $row["JobDescription"];
            $job->skillsRequired = $row["SkillsRequired"];
            $job->experienceRequired = $row["ExperienceRequired"];
            $job->jobLocation = $row["JobLocation"];
            $job->salary = $row["Salary"];
            $job->openDate = strtotime($row["OpenDate"]);
            $job->closeDate = strtotime($row["CloseDate"]);
            $list[] = $job;
        }
        mysqli_close($db);
        return $list;
    }    
    public static function getJobAreas(){
        $list = array();
        $db = self::getConnection();
        $query = "select * from job_areas";
        $result = mysqli_query($db,$query);   
        while($row = mysqli_fetch_assoc($result)){  
            $list[] = $row['AreaOfWork'];
        }
        mysqli_close($db);
        return $list;
    }
    
    public static function applyforJob($ja){
        $db = self::getConnection();
        $seekerId = $ja->seekerId;
        $providerId = $ja->providerId;
        $jobId = $ja->jobId;
        $status = 'None';
        $applicationDate = date('Y-m-d',time());
        $query = "insert into applications(SeekerId,ProviderId,JobId,Status,ApplicationDate) values($seekerId,$providerId,$jobId,'$status','$applicationDate')";
        mysqli_query($db,$query);
        mysqli_close($db);
        //return $list;
    }
    public static function getJobApplications($seekerId){
        $jobId = array();
        $i=1;
        $db = self::getConnection();
        $query = "select JobId from applications where SeekerId=$seekerId";
        $result = mysqli_query($db,$query);    
        while($row = mysqli_fetch_assoc($result)){  
            $jobId[$i++] = $row['JobId'];
        }
        mysqli_close($db);
        return $jobId;
    } 
    public static function getApplications($jobId){
        $seekers = array();
        $db = self::getConnection();
        $query = "select SeekerId from applications where JobId=$jobId";
        $result = mysqli_query($db,$query);    
        while($row = mysqli_fetch_assoc($result)){  
            $seekers[] = $row['SeekerId'];
        }
        mysqli_close($db);
        return $seekers;
    }   
    public static function getSeekerInfo($seekerId){
        $js = new JobSeeker();
        $db = self::getConnection();
        $query = "select * from job_seekers where SeekerId='$seekerId'";
        $result = mysqli_query($db,$query);    
        $row = mysqli_fetch_assoc($result); 
        $js->seekerId = $row["SeekerId"];
        $js->userName = $row["UserName"];
        $js->gender = $row["Gender"];
        $js->email = $row["Email"];
        $js->phone = $row["Phone"];
        $js->address = $row["Address"];
        $js->city = $row["City"];
        $js->country = $row["Country"];
        $js->qualification = $row["Qualification"];
        $js->experience = $row["Experience"];
        $js->objective = $row["Objective"];
        $js->skills = $row["Skills"];
        $js->bioData = $row["BioData"];
        $js->photo = $row["Photo"];
        $js->dateOfBirth = strtotime($row["DateOfBirth"]);
        $js->areaOfWork = $row["AreaOfWork"]; 
        mysqli_close($db);
        return $js;
    }   
    public static function sendMessage($message){
        $db = self::getConnection();
        $seekerId = $message->seekerId;
        $providerId = $message->providerId;
        $messageText = $message->messageText;
        $messageDate = $message->messageDate;
        $query = "insert into messages(SeekerId,ProviderId,MessageText,MessageDate) values($seekerId,$providerId,'$messageText','$messageDate')";
        //echo $query;
        mysqli_query($db,$query);
        mysqli_close($db);
    }   
    public static function getMessages($seekerId){
        $list = array();
        $db = self::getConnection();
        $query = "select * from messages where SeekerId=$seekerId";
        $result = mysqli_query($db,$query);   
        while($row = mysqli_fetch_assoc($result)){ 
            $message = new Message();
            $message->seekerId = $row['SeekerId'];
            $message->providerId = $row['ProviderId'];
            $message->messageText = $row['MessageText'];
            $message->messageDate = strtotime($row['MessageDate']);
            $list[] = $message;
        }
        mysqli_close($db);
        return $list;
    }    
}
