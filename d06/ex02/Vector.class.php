<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vector.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: amartino <amartino@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/10/23 21:44:25 by amartino          #+#    #+#             */
/*   Updated: 2019/10/23 23:31:21 by amartino         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

// require_once('Color.class.php');
require_once('Vertex.class.php');

class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static public $verbose = false;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('dest', $kwargs) && array_key_exists('orig', $kwargs))
		{
			$this->_x = ($kwargs['dest']->get_x()) - ($kwargs['orig']->get_x()) ;
			$this->_y = ($kwargs['dest']->get_y()) - ($kwargs['orig']->get_y()) ;
			$this->_z = ($kwargs['dest']->get_z()) - ($kwargs['orig']->get_z()) ;
		}
		else if (array_key_exists('dest', $kwargs))
		{
			$this->_x = ($kwargs['dest']->get_x());
			$this->_y = ($kwargs['dest']->get_y());
			$this->_z = ($kwargs['dest']->get_z());
		}
		else
			exit ;
		if (self::$verbose == TRUE)
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		return TRUE;
	}

	public function magnitude()
	{
		return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
	}

	public function normalize()
	{
		$mag_abs = abs($this->magnitude());
		$x = $this->_x / $mag_abs;
		$y = $this->_y / $mag_abs;
		$z = $this->_z / $mag_abs;
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function add(Vector $rhs)
	{
		$x = $this->_x + $rhs->get_x();
		$y = $this->_y + $rhs->get_y();
		$z = $this->_z + $rhs->get_z();
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function sub(Vector $rhs)
	{
		$x = $this->_x - $rhs->get_x();
		$y = $this->_y - $rhs->get_y();
		$z = $this->_z - $rhs->get_z();
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function opposite()
	{
		$x = $this->_x * -1;
		$y = $this->_y * -1;
		$z = $this->_z * -1;
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function scalarProduct($k)
	{
		$x = $this->_x * $k;
		$y = $this->_y * $k;
		$z = $this->_z * $k;
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function dotProduct(Vector $rhs)
	{
		$x = $this->_x * $rhs->get_x();
		$y = $this->_y * $rhs->get_y();
		$z = $this->_z * $rhs->get_z();
		$dot_product = $x + $y + $z;
		return $dot_product;
	}

	public function	cos(Vector $rhs)
	{
		$mag_a = $this->magnitude();
		$mag_b = $rhs->magnitude();
		$cos = $this->dotProduct($rhs) / ($mag_a * $mag_b);
		return $cos;
	}

	public function crossProduct(Vector $rhs)
	{
		$x = $this->_y * $rhs->get_z() - $rhs->get_y() * $this->_z;
		$y = $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z();
		$z = $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x();
		$tmp = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z ) );
		return new Vector(['dest' => $tmp]);
	}

	public function __toString()
	{
		if (self::$verbose == TRUE)
			$str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			$str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w);
		return $str;
	}

	public static function doc()
	{
		$str = file_get_contents('Vector.doc.txt');
			return $str;
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

	public function get_x() { return $this->_x; }
	public function get_y() { return $this->_y; }
	public function get_z() { return $this->_z; }
	public function get_w() { return $this->_w; }
	public function __get($name)
	{
		return false;
	}
	public function __set($name, $value)
	{
		return false;
	}
}
