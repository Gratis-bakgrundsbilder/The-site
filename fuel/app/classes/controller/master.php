<?php

/**
 * The Master controller
 *
 * This controller load the right page and take care
 * of search querys etc.
 * 
 * @author Sony?
 */
class Controller_Master extends Controller
{

	/**
	 * Load the index page
	 *
	 * @require template/index
	 */
	public function action_index()
	{
		return Response::forge(ViewModel::forge('template/index'));
	}


	/**
	 * Search result 
	 */
	public function action_search()
	{
		return Response::forge(ViewModel::forge(''));
	}


	/**
	 * Show ONE image
	 */
	public function action_showImage()
	{
		return Response::forge(ViewModel::forge('template/singleImage'));
	}

 

	/**
	 * Lists the images
	 */
	public function action_listImages()
	{
		return Response::forge(ViewModel::forge(''));
	}
	

	/**
	 * The 404 action for the application.
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('404'), 404);
	}
}
