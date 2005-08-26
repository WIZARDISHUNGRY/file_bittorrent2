<?php

// +----------------------------------------------------------------------+
// | Decode and Encode data in Bittorrent format                          |
// +----------------------------------------------------------------------+
// | Copyright (C) 2004-2005 Markus Tacker <m@tacker.org>                 |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the                |
// | Free Software Foundation, Inc.                                       |
// | 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA               |
// +----------------------------------------------------------------------+

/**
* Example usage of File_Bittorrent
*
* @author Markus Tacker <m@tacker.org>
* @version $Id$
*/

/**
* Include class
*/
require_once 'File/Bittorrent/Encode.php';
require_once 'File/Bittorrent/Decode.php';

$File_Bittorrent_Decode = new File_Bittorrent_Decode;
$File_Bittorrent_Encode = new File_Bittorrent_Encode;

// Encoding vars
echo "Encoding integers\n";
$encodedInt = $File_Bittorrent_Encode->encode(10);
var_dump($encodedInt);
var_dump($File_Bittorrent_Decode->decode($encodedInt));

echo "Encoding strings\n";
$encodedStr = $File_Bittorrent_Encode->encode('This is a string.');
var_dump($encodedStr);
var_dump($File_Bittorrent_Decode->decode($encodedStr));

echo "Encoding arrays as lists\n";
$encodedList = $File_Bittorrent_Encode->encode(array('Banana', 'Apple', 'Cherry'));
var_dump($encodedList);
var_dump($File_Bittorrent_Decode->decode($encodedList));

echo "Encoding arrays as dictionaries\n";
$encodedDict = $File_Bittorrent_Encode->encode(array('fruits' => array('Banana', 'Apple', 'Cherry','subarray' => array(1,2,3)), 'ints' => array(1,2,3), 'count' => 3));
var_dump($encodedDict);
print_r($File_Bittorrent_Decode->decode($encodedDict));

// Decode a file
print_r($File_Bittorrent_Decode->decodeFile('freebsd.torrent'));

/* Output of decode

Array
(
    [name] => FreeBSD_5.2.1-RELEASE-i386-All_CDs
    [filename] => freebsd.torrent
    [comment] =>
    [date] => 1087952410
    [created_by] => Azureus/2.1.0.0
    [files] => Array
        (
            [0] => Array
                (
                    [filename] => 5.2.1-RELEASE-i386-bootonly.iso
                    [size] => 21692416
                )

            [1] => Array
                (
                    [filename] => 5.2.1-RELEASE-i386-disc1.iso
                    [size] => 675151872
                )

            [2] => Array
                (
                    [filename] => 5.2.1-RELEASE-i386-disc2.iso
                    [size] => 274857984
                )

            [3] => Array
                (
                    [filename] => 5.2.1-RELEASE-i386-miniinst.iso
                    [size] => 251428864
                )

            [4] => Array
                (
                    [filename] => CHECKSUM.MD5
                    [size] => 286
                )

            [5] => Array
                (
                    [filename] => freebsd521.sfv
                    [size] => 683
                )

        )

    [size] => 1223132105
    [announce] => http://69.156.42.20:6969/announce
    [announce_list] => Array
        (
            [0] => http://glimux.sytes.net:6969/announce
            [1] => http://69.156.42.20:6969/announce
        )

)

*/

?>