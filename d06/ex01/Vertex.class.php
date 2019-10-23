<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vertex.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: amartino <amartino@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/10/23 21:14:40 by amartino          #+#    #+#             */
/*   Updated: 2019/10/23 21:41:36 by amartino         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once('Color.class.php');

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static public $verbose = false;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = floatval($kwargs['x']);
			$this->_y = floatval($kwargs['y']);
			$this->_z = floatval($kwargs['z']);
		}
		else
			exit ;
		$this->_w = array_key_exists('w', $kwargs) ? floatval($kwargs['w']) : 1.0;
		if (array_key_exists('color', $kwargs) == FALSE)
			$this->_color = new Color(array('rgb' => 0xFFFFFF));
		else if ($kwargs['color'] instanceof Color)
			$this->_color = $kwargs['color'];
		else
			return FALSE;
		if (self::$verbose == TRUE)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		return TRUE;
	}

	public function __toString()
	{
		if (self::$verbose == TRUE)
			$str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			$str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w);
		return $str;
	}
	
	public static function doc()
	{
		$str = file_get_contents('Vertex.doc.txt');
			return $str;
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

	public function get_x() { return $this->_x; }
	public function set_x($arg)
	{
		if (gettype($arg) == "double")
			$this->_x = $arg;
	}

	public function get_y() { return $this->_y; }
	public function set_y($arg)
	{
		if (gettype($arg) == "double")
			$this->_y = $arg;
	}

	public function get_z() { return $this->_z; }
	public function set_z($arg)
	{
		if (gettype($arg) == "double")
			$this->_z = $arg;
	}

	public function get_w() { return $this->_w; }
	public function set_w($arg)
	{
		if (gettype($arg) == "double")
			$this->_w = $arg;
	}

	public function get_color() { return $this->_color; }
	public function set_color($arg)
	{
		if ($kwargs['color'] instanceof Color)
			$this->_color = $arg;
	}

	public function __get($name)
	{
		return false;
	}
	public function __set($name, $value)
	{
		return false;
	}
}
