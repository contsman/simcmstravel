<?php   
/**
 * 缓存类
 */
	class fzz_cache{ 
		
		public $limit_time = 20; //缓存过期时间       
		public $cache_dir = "cache"; //缓存文件保存目录       
		
		//写入缓存
		function __set($key , $val){           
			$this->set($key ,$val);       
		}       
		
		
		//第三个参数为过期时间   
		function set($key ,$val,$limit_time=null){           
			$limit_time = $limit_time ? $limit_time : $this->limit_time;           
			$file = $this->cache_dir."/".$key.".php";           
			$val = serialize($val);           
			@file_put_contents($file,$val) or $this->error(__line__,"文件写入失败");        
			           echo $limit_time;
			@touch($file,time()+$limit_time) or $this->error(__line__,"更改文件时间失败");       
		}
		
		//读取缓存      
		function __get($key){           
			return $this->get($key);  
		}  
		

		function get($key){        
			$file = $this->cache_dir."/".$key.".php";           
			if (@filemtime($file)>=time()){               
				return unserialize(file_get_contents($file));           
			}
			else{               
				@unlink($file);       
			}       
		}
		
		//删除缓存文件 
		function __unset($key){           
			return $this->_unset($key);       
		}       
		function _unset($key){           
			if (@unlink($this->cache_dir."/".$key.".php")){               
				return true;          
			}
			else{               
				return false;           
			}       
		}       
		
		//检查缓存是否存在，过期则认为不存在       
		function __isset($key){           
			return $this->_isset($key);       
		} 
		
		function _isset($key){          
			$file = $this->cache_dir."/".$key.".php";       
			if (@filemtime($file)>=time()){               
				return true;           
			}else{               
				@unlink($file);               
				return false;           
			}       
		}       
		
		
		//清除过期缓存文件       
		function clear(){           
			$files = dir($this->cache_dir); 
			foreach ($files as $val){               
				if (filemtime($this->cache_dir."/".$val)){
					@unlink($this->cache_dir."/".$val);
				}
			}    
		}       
		
		//清除所有缓存文件							
		/*function clear_all(){           
			$files = dir($this->cache_dir);  
			print_r($files);exit;
			foreach ($files as $val){           
				@unlink($this->cache_dir."/".$val);
			}       
		} */      

		//清除所有缓存文件							
		function clear_all(){           
			 @unlink($this->cache_dir."/common_cache.php");     
		}    

		function error($line,$msg){          
			die("出错文件：".__file__."\n出错行：$line\n错误信息：$msg");       
		}   
	}   
?>