<?php
	namespace Lib;
	class Category {
		/*组合一维数组*/
		static public function unlimitedForLevel ($array, $html ='', $sep ='—— ', $pid = 0, $level = 0) {
			$arr = array();
			foreach ($array as $v) {
				if ($v['parent'] == $pid) {
					if ($level > 0) {
						$sep_ = $sep;
					}else {
						$sep_ = '';
					}
					$v['level'] = $level + 1;					
					$v['html'] = str_repeat($html, $level) . $sep_;
					$arr[] = $v;
					$arr = array_merge($arr, self::unlimitedForLevel($array, $html, $sep, $v['id'], $level + 1));
				}
			}
			return $arr;
		}
		/*组合多维数组*/
		static public function unlimitedForLayer ($array, $name, $pid = 0) {
			$arr = array();
			foreach ($array as $v) {
				if ($v['parent'] == $pid) {
					$v[$name] = self::unlimitedForLayer($array, $name, $v['id']);
					$arr[] = $v;
				}
			}
			return $arr;
		}
		/*传递子分类ID返回所有的父级分类*/
		static public function getParents ($array, $id) {
			$arr = array();
			foreach ($array as $v) {
				if ($v['id'] == $id) {
					$arr[] = $v;
					$arr = array_merge(self::getParents($array, $v['parent']), $arr);
				}
			}
			return $arr;
		}
		/*传递父级分类ID返回所有的子级分类ID*/
		static public function getChildsId ($array, $pid, $self = false) {
			$arr = array();
			foreach ($array as $v) {
				if ($v['parent'] == $pid) {
					$arr[] = $v['id'];
					$arr = array_merge($arr, self::getChildsId($array, $v['id'], false));
				}
			}
			if ($self) {
				$arr[] = $pid;
			}
			return $arr;
		}
		/*传递父级分类ID返回所有的子级分类*/
		static public function getChilds ($array, $pid) {
			$arr = array();
			foreach ($array as $v) {
				if ($v['parent'] == $pid) {
					$arr[] = $v;
					$arr = array_merge($arr, self::getChilds($array, $v['id']));
				}
			}
			return $arr;
		}
		/*将查询出来的二维数组转换成一维数组*/
		static public function arrayChange ($array, $key) {
			$arr = array();
			foreach ($array as $v) {				
				$arr[] = $v[$key];
			}
			return $arr;
		}
	}
?>