<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Color.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: amartino <amartino@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/10/23 14:59:17 by amartino          #+#    #+#             */
/*   Updated: 2019/10/23 21:10:29 by amartino         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class Color
{
	public $red;
	public $green;
	public $blue;
	public static $verbose = FALSE;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = (($kwargs['rgb'] & 0x00ff0000) >> 16);
			$this->green = (($kwargs['rgb'] & 0x0000ff00) >> 8);
			$this->blue = ($kwargs['rgb'] & 0x000000ff);
		}
		else
		{
			$this->red = array_key_exists('red', $kwargs) ? intval($kwargs['red']) : 0;
			$this->green = array_key_exists('green', $kwargs) ? intval($kwargs['green']) : 0;
			$this->blue = array_key_exists('blue', $kwargs) ? intval($kwargs['blue']) : 0;
		}
		if (self::$verbose === TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	public function add(Color $to_add)
	{
		$new_red = $this->red + $to_add->red;
		$new_green = $this->green + $to_add->green;
		$new_blue = $this->blue + $to_add->blue;
		$arg = array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue);
		$instance = new Color($arg);
		return $instance;
	}

	public function sub(Color $to_sub)
	{
		$new_red = $this->red - $to_sub->red;
		$new_green = $this->green - $to_sub->green;
		$new_blue = $this->blue - $to_sub->blue;
		$arg = array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue);
		$instance = new Color($arg);
		return $instance;
	}

	public function mult($to_mult)
	{
		$new_red = $this->red * $to_mult;
		$new_green = $this->green * $to_mult;
		$new_blue = $this->blue * $to_mult;
		$arg = array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue);
		$instance = new Color($arg);
		return $instance;
	}

	public function __toString()
	{
		$str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
		return $str;
	}

	public static function doc()
	{
		$doc = file_get_contents("./Color.doc.txt");
		return $doc;
	}

	public function __destruct()
	{
		if (self::$verbose === TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}
}
?>
