<?php

use barcodegen\BCGColor;
use barcodegen\BCGDrawing;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 16:35
 */

function generateBarcode($data, $output, $thickness = 20, $type = "BCGcode128")
{
    $drawException = null;
    // The arguments are R, G, B for color.
    $color_black = new BCGColor(0, 0, 0);
    $color_white = new BCGColor(255, 255, 255);
    $className="\barcodegen\\type\\{$type}";
    $code = new $className;
    $code->setScale(2); // Resolution
    $code->setThickness($thickness); // Thickness
    $code->setForegroundColor($color_black); // Color of bars
    $code->setBackgroundColor($color_white); // Color of spaces
    $code->setLabel($data); // Text
    /* Here is the list of the arguments
   1 - Filename (empty : display on screen)
   2 - Background color */
    $drawing = new BCGDrawing($output, $color_white);
    $drawing->setBarcode($code);
    $drawing->draw();
    // Draw (or save) the image into PNG format.
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
}