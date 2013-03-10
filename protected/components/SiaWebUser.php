<?php
class SiaWebUser extends CWebUser{
        const ADMIN=1;//konstanta ini untuk level
        const MEMBER=0;
        static $profile=array();
        public function getLevel(){
                $user=User::model()->findByPk($this->id);
                if($user)
                        return $user->LEVEL;
        }
//        public function isAdmin(){
//                return ($this->getLevel()==EWebUser::ADMIN);
//        }
        public function isLogin(){
            return $this->id!=null;
        }
        public function isAdmin(){
            $profile=  $this->getProfile();
            return $profile->status=='tu';
        }
        public function isGuru(){
            $profile=  $this->getProfile();
            return $profile->status=='guru';
        }
        public function getUserType(){
            $profile=  $this->getProfile();
            return $profile->status;
        }
        
        public function getProfile(){
            if(count(SiaWebUser::$profile)==0){
                SiaWebUser::$profile=User::model()->findByAttributes(array('username'=>$this->id));
            }
            return SiaWebUser::$profile;
        }
        public function getUsername() {
            $profile=  $this->getProfile();
            return $profile->username;
        }
        public function getUserId(){
            $profile=  $this->getProfile();
            return $profile->id;
        }
}
?>