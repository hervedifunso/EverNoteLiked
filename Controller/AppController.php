<?php

class AppController{
	private $methode;
	private $action;
	private $items;
	private $title;
	private $html;
	private $css;
	private $js;
	
	public function AppController()
	{
		
	}
	
	public function setMethode($methodeModel)
	{
		$this->methode=$methodeModel;
	}
	
	public function setAction($pageAction)
	{
		$this->action=$pageAction;
	}
	
	public function setItems($elements)
	{
		$this->items=$elements;
	}
	
	public function setTitle($titre)
	{
		$this->title=$titre;
	}
	
	public function setHtml($contenuHtml)
	{
		$this->html=$contenuHtml;
	}
	
	public function setCss($style)
	{
		$this->css=$style;
	}
	
	public function setJs($evenements)
	{
		$this->js=$evenements;
	}

	public function renderPage()
	{
		$includedArray=array();
		$styleVue=$this->checkAll($this->css);
		$evenementsVue=$this->checkAll($this->js);
		
		$title=$this->check($this->title);
		$donneesVue=$this->checkAll($this->items);
		$operation=$this->check($this->methode);
		$nomCont=$this->check($this->action);

		for($p=0;$p<count($this->checkAll($this->html));$p++)
			include $this->html[$p];
		
			//include_once $this->html[$i];
	}
	
	public function makeIndex($raw_user_datas)
	{
		array_shift($raw_user_datas);
		$user_datas=array();
		$posted_indexes=array_keys($raw_user_datas);
		$posted_user=array_values($raw_user_datas);
		for($i=0;$i<count($raw_user_datas);$i++)
			if(!empty($posted_user[$i]))
				$user_datas = array_merge($user_datas,array("user_".$posted_indexes[$i]=>$this->check($posted_user[$i])));
			else $user_datas['success']=false;
		return $user_datas;
	}
	
	//a mettre dans classe outil
	public function check($test)
	{
		if(isset($test)&&!empty($test)) return strip_tags($test);
		else return '';
	}
	
	public function checkAll($testArray)
	{
		$found=true;
		for($i=0;($i<count($testArray))&&$found;$i++)
			$found = !empty($this->check($testArray[$i]));
		if($found) return $testArray;
		else return '';
	}
}