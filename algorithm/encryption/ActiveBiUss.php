<?php

class ActiveBiUss {

/*
加密因子：
1 用户ID UID
2 2个随机数n, o
3 1-60的秒数
3 时间戳 TS
*/

	private static $__ref_dict_core_0 = /*1~ qaz QAZ
		'0987654321' .
		'qwertyuiop' .
		'asdfghjkl' .
		'zxcvbnm' .
		'QWERTYUIOP' .
		'ASDFGHJKL' .
		'ZXCVBNM'; */

		'0987654321 qwertyuiop asdfghjkl zxcvbnm QWERTYUIOP ASDFGHJKL ZXCVBNM';
	private static $__ref_dict_core_1 = /*qaz~ ZQA 1
		'poiuytrewq' .
		'lkjhgfdsa' .
		'mnbvcxz' .
		'ZXCVBNM' .
		'QWERTYUIOP' .
		'ASDFGHJKL' .
		'1234567890'; */

		'poiuytrewq lkjhgfdsa mnbvcxz ZXCVBNM QWERTYUIOP ASDFGHJKL 1234567890';
	private static $__ref_dict_core_2 = /*AZq~ 1~ aQz
		'ASDFGHJKL' .
		'ZXCVBNM' .
		'poiuytrewq' .
		'0987654321' .
		'asdfghjkl' .
		'QWERTYUIOP' .
		'zxcvbnm'; */

		'ASDFGHJKL ZXCVBNM poiuytrewq 0987654321 asdfghjkl QWERTYUIOP zxcvbnm';
	private static $__ref_dict_core_3 = /*QAZ 1~ qaz~
		'QWERTYUIOP' .
		'ASDFGHJKL' .
		'ZXCVBNM' .
		'0987654321' .
		'poiuytrewq' .
		'lkjhgfdsa' .
		'mnbvcxz'; */

		'QWERTYUIOP ASDFGHJKL ZXCVBNM 0987654321 poiuytrewq lkjhgfdsa mnbvcxz';
	private static $__ref_dict_core_4 = /*1 QAZ~ aqz
		'1234567890' .
		'POIUYTREWQ' .
		'LKJHGFDSA' .
		'MNBVCXZ' .
		'asdfghjkl' .
		'qwertyuiop' .
		'zxcvbnm'; */

		'1234567890 POIUYTREWQ LKJHGFDSA MNBVCXZ asdfghjkl qwertyuiop zxcvbnm';
	private static $__ref_dict_core_5 = /*qaz 1~ QAZ
		'qwertyuiop' .
		'asdfghjkl' .
		'zxcvbnm' .
		'0987654321' .
		'QWERTYUIOP' .
		'ASDFGHJKL' .
		'ZXCVBNM'; */

		'qwertyuiop asdfghjkl zxcvbnm 0987654321 QWERTYUIOP ASDFGHJKL ZXCVBNM';
	private static $__ref_dict_core_6 = /*AZQ qaz 1
		'ASDFGHJKL' .
		'ZXCVBNM' .
		'QWERTYUIOP' .
		'qwertyuiop' .
		'asdfghjkl' .
		'zxcvbnm' .
		'1234567890'; */

		'ASDFGHJKL ZXCVBNM QWERTYUIOP qwertyuiop asdfghjkl zxcvbnm 1234567890';

	private static $__dict_core_0 = array (
	  0 => '0',
	  1 => '9',
	  2 => '8',
	  3 => '7',
	  4 => '6',
	  5 => '5',
	  6 => '4',
	  7 => '3',
	  8 => '2',
	  9 => '1',
	  10 => 'q',
	  11 => 'w',
	  12 => 'e',
	  13 => 'r',
	  14 => 't',
	  15 => 'y',
	  16 => 'u',
	  17 => 'i',
	  18 => 'o',
	  19 => 'p',
	  20 => 'a',
	  21 => 's',
	  22 => 'd',
	  23 => 'f',
	  24 => 'g',
	  25 => 'h',
	  26 => 'j',
	  27 => 'k',
	  28 => 'l',
	  29 => 'z',
	  30 => 'x',
	  31 => 'c',
	  32 => 'v',
	  33 => 'b',
	  34 => 'n',
	  35 => 'm',
	  36 => 'Q',
	  37 => 'W',
	  38 => 'E',
	  39 => 'R',
	  40 => 'T',
	  41 => 'Y',
	  42 => 'U',
	  43 => 'I',
	  44 => 'O',
	  45 => 'P',
	  46 => 'A',
	  47 => 'S',
	  48 => 'D',
	  49 => 'F',
	  50 => 'G',
	  51 => 'H',
	  52 => 'J',
	  53 => 'K',
	  54 => 'L',
	  55 => 'Z',
	  56 => 'X',
	  57 => 'C',
	  58 => 'V',
	  59 => 'B',
	  60 => 'N',
	  61 => 'M',
	);
	private static $__dict_core_1 = array (
	  0 => 'p',
	  1 => 'o',
	  2 => 'i',
	  3 => 'u',
	  4 => 'y',
	  5 => 't',
	  6 => 'r',
	  7 => 'e',
	  8 => 'w',
	  9 => 'q',
	  10 => 'l',
	  11 => 'k',
	  12 => 'j',
	  13 => 'h',
	  14 => 'g',
	  15 => 'f',
	  16 => 'd',
	  17 => 's',
	  18 => 'a',
	  19 => 'm',
	  20 => 'n',
	  21 => 'b',
	  22 => 'v',
	  23 => 'c',
	  24 => 'x',
	  25 => 'z',
	  26 => 'Z',
	  27 => 'X',
	  28 => 'C',
	  29 => 'V',
	  30 => 'B',
	  31 => 'N',
	  32 => 'M',
	  33 => 'Q',
	  34 => 'W',
	  35 => 'E',
	  36 => 'R',
	  37 => 'T',
	  38 => 'Y',
	  39 => 'U',
	  40 => 'I',
	  41 => 'O',
	  42 => 'P',
	  43 => 'A',
	  44 => 'S',
	  45 => 'D',
	  46 => 'F',
	  47 => 'G',
	  48 => 'H',
	  49 => 'J',
	  50 => 'K',
	  51 => 'L',
	  52 => '1',
	  53 => '2',
	  54 => '3',
	  55 => '4',
	  56 => '5',
	  57 => '6',
	  58 => '7',
	  59 => '8',
	  60 => '9',
	  61 => '0',
	);
	private static $__dict_core_2 = array (
	  0 => 'A',
	  1 => 'S',
	  2 => 'D',
	  3 => 'F',
	  4 => 'G',
	  5 => 'H',
	  6 => 'J',
	  7 => 'K',
	  8 => 'L',
	  9 => 'Z',
	  10 => 'X',
	  11 => 'C',
	  12 => 'V',
	  13 => 'B',
	  14 => 'N',
	  15 => 'M',
	  16 => 'p',
	  17 => 'o',
	  18 => 'i',
	  19 => 'u',
	  20 => 'y',
	  21 => 't',
	  22 => 'r',
	  23 => 'e',
	  24 => 'w',
	  25 => 'q',
	  26 => '0',
	  27 => '9',
	  28 => '8',
	  29 => '7',
	  30 => '6',
	  31 => '5',
	  32 => '4',
	  33 => '3',
	  34 => '2',
	  35 => '1',
	  36 => 'a',
	  37 => 's',
	  38 => 'd',
	  39 => 'f',
	  40 => 'g',
	  41 => 'h',
	  42 => 'j',
	  43 => 'k',
	  44 => 'l',
	  45 => 'Q',
	  46 => 'W',
	  47 => 'E',
	  48 => 'R',
	  49 => 'T',
	  50 => 'Y',
	  51 => 'U',
	  52 => 'I',
	  53 => 'O',
	  54 => 'P',
	  55 => 'z',
	  56 => 'x',
	  57 => 'c',
	  58 => 'v',
	  59 => 'b',
	  60 => 'n',
	  61 => 'm',
	);
	private static $__dict_core_3 = array (
	  0 => 'Q',
	  1 => 'W',
	  2 => 'E',
	  3 => 'R',
	  4 => 'T',
	  5 => 'Y',
	  6 => 'U',
	  7 => 'I',
	  8 => 'O',
	  9 => 'P',
	  10 => 'A',
	  11 => 'S',
	  12 => 'D',
	  13 => 'F',
	  14 => 'G',
	  15 => 'H',
	  16 => 'J',
	  17 => 'K',
	  18 => 'L',
	  19 => 'Z',
	  20 => 'X',
	  21 => 'C',
	  22 => 'V',
	  23 => 'B',
	  24 => 'N',
	  25 => 'M',
	  26 => '0',
	  27 => '9',
	  28 => '8',
	  29 => '7',
	  30 => '6',
	  31 => '5',
	  32 => '4',
	  33 => '3',
	  34 => '2',
	  35 => '1',
	  36 => 'p',
	  37 => 'o',
	  38 => 'i',
	  39 => 'u',
	  40 => 'y',
	  41 => 't',
	  42 => 'r',
	  43 => 'e',
	  44 => 'w',
	  45 => 'q',
	  46 => 'l',
	  47 => 'k',
	  48 => 'j',
	  49 => 'h',
	  50 => 'g',
	  51 => 'f',
	  52 => 'd',
	  53 => 's',
	  54 => 'a',
	  55 => 'm',
	  56 => 'n',
	  57 => 'b',
	  58 => 'v',
	  59 => 'c',
	  60 => 'x',
	  61 => 'z',
	);
	private static $__dict_core_4 = array (
	  0 => '1',
	  1 => '2',
	  2 => '3',
	  3 => '4',
	  4 => '5',
	  5 => '6',
	  6 => '7',
	  7 => '8',
	  8 => '9',
	  9 => '0',
	  10 => 'P',
	  11 => 'O',
	  12 => 'I',
	  13 => 'U',
	  14 => 'Y',
	  15 => 'T',
	  16 => 'R',
	  17 => 'E',
	  18 => 'W',
	  19 => 'Q',
	  20 => 'L',
	  21 => 'K',
	  22 => 'J',
	  23 => 'H',
	  24 => 'G',
	  25 => 'F',
	  26 => 'D',
	  27 => 'S',
	  28 => 'A',
	  29 => 'M',
	  30 => 'N',
	  31 => 'B',
	  32 => 'V',
	  33 => 'C',
	  34 => 'X',
	  35 => 'Z',
	  36 => 'a',
	  37 => 's',
	  38 => 'd',
	  39 => 'f',
	  40 => 'g',
	  41 => 'h',
	  42 => 'j',
	  43 => 'k',
	  44 => 'l',
	  45 => 'q',
	  46 => 'w',
	  47 => 'e',
	  48 => 'r',
	  49 => 't',
	  50 => 'y',
	  51 => 'u',
	  52 => 'i',
	  53 => 'o',
	  54 => 'p',
	  55 => 'z',
	  56 => 'x',
	  57 => 'c',
	  58 => 'v',
	  59 => 'b',
	  60 => 'n',
	  61 => 'm',
	);
	private static $__dict_core_5 = array (
	  0 => 'q',
	  1 => 'w',
	  2 => 'e',
	  3 => 'r',
	  4 => 't',
	  5 => 'y',
	  6 => 'u',
	  7 => 'i',
	  8 => 'o',
	  9 => 'p',
	  10 => 'a',
	  11 => 's',
	  12 => 'd',
	  13 => 'f',
	  14 => 'g',
	  15 => 'h',
	  16 => 'j',
	  17 => 'k',
	  18 => 'l',
	  19 => 'z',
	  20 => 'x',
	  21 => 'c',
	  22 => 'v',
	  23 => 'b',
	  24 => 'n',
	  25 => 'm',
	  26 => '0',
	  27 => '9',
	  28 => '8',
	  29 => '7',
	  30 => '6',
	  31 => '5',
	  32 => '4',
	  33 => '3',
	  34 => '2',
	  35 => '1',
	  36 => 'Q',
	  37 => 'W',
	  38 => 'E',
	  39 => 'R',
	  40 => 'T',
	  41 => 'Y',
	  42 => 'U',
	  43 => 'I',
	  44 => 'O',
	  45 => 'P',
	  46 => 'A',
	  47 => 'S',
	  48 => 'D',
	  49 => 'F',
	  50 => 'G',
	  51 => 'H',
	  52 => 'J',
	  53 => 'K',
	  54 => 'L',
	  55 => 'Z',
	  56 => 'X',
	  57 => 'C',
	  58 => 'V',
	  59 => 'B',
	  60 => 'N',
	  61 => 'M',
	);
	private static $__dict_core_6 = array (
	  0 => 'A',
	  1 => 'S',
	  2 => 'D',
	  3 => 'F',
	  4 => 'G',
	  5 => 'H',
	  6 => 'J',
	  7 => 'K',
	  8 => 'L',
	  9 => 'Z',
	  10 => 'X',
	  11 => 'C',
	  12 => 'V',
	  13 => 'B',
	  14 => 'N',
	  15 => 'M',
	  16 => 'Q',
	  17 => 'W',
	  18 => 'E',
	  19 => 'R',
	  20 => 'T',
	  21 => 'Y',
	  22 => 'U',
	  23 => 'I',
	  24 => 'O',
	  25 => 'P',
	  26 => 'q',
	  27 => 'w',
	  28 => 'e',
	  29 => 'r',
	  30 => 't',
	  31 => 'y',
	  32 => 'u',
	  33 => 'i',
	  34 => 'o',
	  35 => 'p',
	  36 => 'a',
	  37 => 's',
	  38 => 'd',
	  39 => 'f',
	  40 => 'g',
	  41 => 'h',
	  42 => 'j',
	  43 => 'k',
	  44 => 'l',
	  45 => 'z',
	  46 => 'x',
	  47 => 'c',
	  48 => 'v',
	  49 => 'b',
	  50 => 'n',
	  51 => 'm',
	  52 => '1',
	  53 => '2',
	  54 => '3',
	  55 => '4',
	  56 => '5',
	  57 => '6',
	  58 => '7',
	  59 => '8',
	  60 => '9',
	  61 => '0',
	);

	private static $__dict_core_0_char_index = array (
	  0 => 0,
	  9 => 1,
	  8 => 2,
	  7 => 3,
	  6 => 4,
	  5 => 5,
	  4 => 6,
	  3 => 7,
	  2 => 8,
	  1 => 9,
	  'q' => 10,
	  'w' => 11,
	  'e' => 12,
	  'r' => 13,
	  't' => 14,
	  'y' => 15,
	  'u' => 16,
	  'i' => 17,
	  'o' => 18,
	  'p' => 19,
	  'a' => 20,
	  's' => 21,
	  'd' => 22,
	  'f' => 23,
	  'g' => 24,
	  'h' => 25,
	  'j' => 26,
	  'k' => 27,
	  'l' => 28,
	  'z' => 29,
	  'x' => 30,
	  'c' => 31,
	  'v' => 32,
	  'b' => 33,
	  'n' => 34,
	  'm' => 35,
	  'Q' => 36,
	  'W' => 37,
	  'E' => 38,
	  'R' => 39,
	  'T' => 40,
	  'Y' => 41,
	  'U' => 42,
	  'I' => 43,
	  'O' => 44,
	  'P' => 45,
	  'A' => 46,
	  'S' => 47,
	  'D' => 48,
	  'F' => 49,
	  'G' => 50,
	  'H' => 51,
	  'J' => 52,
	  'K' => 53,
	  'L' => 54,
	  'Z' => 55,
	  'X' => 56,
	  'C' => 57,
	  'V' => 58,
	  'B' => 59,
	  'N' => 60,
	  'M' => 61,
	);
	private static $__dict_core_1_char_index = array (
	  'p' => 0,
	  'o' => 1,
	  'i' => 2,
	  'u' => 3,
	  'y' => 4,
	  't' => 5,
	  'r' => 6,
	  'e' => 7,
	  'w' => 8,
	  'q' => 9,
	  'l' => 10,
	  'k' => 11,
	  'j' => 12,
	  'h' => 13,
	  'g' => 14,
	  'f' => 15,
	  'd' => 16,
	  's' => 17,
	  'a' => 18,
	  'm' => 19,
	  'n' => 20,
	  'b' => 21,
	  'v' => 22,
	  'c' => 23,
	  'x' => 24,
	  'z' => 25,
	  'Z' => 26,
	  'X' => 27,
	  'C' => 28,
	  'V' => 29,
	  'B' => 30,
	  'N' => 31,
	  'M' => 32,
	  'Q' => 33,
	  'W' => 34,
	  'E' => 35,
	  'R' => 36,
	  'T' => 37,
	  'Y' => 38,
	  'U' => 39,
	  'I' => 40,
	  'O' => 41,
	  'P' => 42,
	  'A' => 43,
	  'S' => 44,
	  'D' => 45,
	  'F' => 46,
	  'G' => 47,
	  'H' => 48,
	  'J' => 49,
	  'K' => 50,
	  'L' => 51,
	  1 => 52,
	  2 => 53,
	  3 => 54,
	  4 => 55,
	  5 => 56,
	  6 => 57,
	  7 => 58,
	  8 => 59,
	  9 => 60,
	  0 => 61,
	);
	private static $__dict_core_2_char_index = array (
	  'A' => 0,
	  'S' => 1,
	  'D' => 2,
	  'F' => 3,
	  'G' => 4,
	  'H' => 5,
	  'J' => 6,
	  'K' => 7,
	  'L' => 8,
	  'Z' => 9,
	  'X' => 10,
	  'C' => 11,
	  'V' => 12,
	  'B' => 13,
	  'N' => 14,
	  'M' => 15,
	  'p' => 16,
	  'o' => 17,
	  'i' => 18,
	  'u' => 19,
	  'y' => 20,
	  't' => 21,
	  'r' => 22,
	  'e' => 23,
	  'w' => 24,
	  'q' => 25,
	  0 => 26,
	  9 => 27,
	  8 => 28,
	  7 => 29,
	  6 => 30,
	  5 => 31,
	  4 => 32,
	  3 => 33,
	  2 => 34,
	  1 => 35,
	  'a' => 36,
	  's' => 37,
	  'd' => 38,
	  'f' => 39,
	  'g' => 40,
	  'h' => 41,
	  'j' => 42,
	  'k' => 43,
	  'l' => 44,
	  'Q' => 45,
	  'W' => 46,
	  'E' => 47,
	  'R' => 48,
	  'T' => 49,
	  'Y' => 50,
	  'U' => 51,
	  'I' => 52,
	  'O' => 53,
	  'P' => 54,
	  'z' => 55,
	  'x' => 56,
	  'c' => 57,
	  'v' => 58,
	  'b' => 59,
	  'n' => 60,
	  'm' => 61,
	);
	private static $__dict_core_3_char_index = array (
	  'Q' => 0,
	  'W' => 1,
	  'E' => 2,
	  'R' => 3,
	  'T' => 4,
	  'Y' => 5,
	  'U' => 6,
	  'I' => 7,
	  'O' => 8,
	  'P' => 9,
	  'A' => 10,
	  'S' => 11,
	  'D' => 12,
	  'F' => 13,
	  'G' => 14,
	  'H' => 15,
	  'J' => 16,
	  'K' => 17,
	  'L' => 18,
	  'Z' => 19,
	  'X' => 20,
	  'C' => 21,
	  'V' => 22,
	  'B' => 23,
	  'N' => 24,
	  'M' => 25,
	  0 => 26,
	  9 => 27,
	  8 => 28,
	  7 => 29,
	  6 => 30,
	  5 => 31,
	  4 => 32,
	  3 => 33,
	  2 => 34,
	  1 => 35,
	  'p' => 36,
	  'o' => 37,
	  'i' => 38,
	  'u' => 39,
	  'y' => 40,
	  't' => 41,
	  'r' => 42,
	  'e' => 43,
	  'w' => 44,
	  'q' => 45,
	  'l' => 46,
	  'k' => 47,
	  'j' => 48,
	  'h' => 49,
	  'g' => 50,
	  'f' => 51,
	  'd' => 52,
	  's' => 53,
	  'a' => 54,
	  'm' => 55,
	  'n' => 56,
	  'b' => 57,
	  'v' => 58,
	  'c' => 59,
	  'x' => 60,
	  'z' => 61,
	);
	private static $__dict_core_4_char_index = array (
	  1 => 0,
	  2 => 1,
	  3 => 2,
	  4 => 3,
	  5 => 4,
	  6 => 5,
	  7 => 6,
	  8 => 7,
	  9 => 8,
	  0 => 9,
	  'P' => 10,
	  'O' => 11,
	  'I' => 12,
	  'U' => 13,
	  'Y' => 14,
	  'T' => 15,
	  'R' => 16,
	  'E' => 17,
	  'W' => 18,
	  'Q' => 19,
	  'L' => 20,
	  'K' => 21,
	  'J' => 22,
	  'H' => 23,
	  'G' => 24,
	  'F' => 25,
	  'D' => 26,
	  'S' => 27,
	  'A' => 28,
	  'M' => 29,
	  'N' => 30,
	  'B' => 31,
	  'V' => 32,
	  'C' => 33,
	  'X' => 34,
	  'Z' => 35,
	  'a' => 36,
	  's' => 37,
	  'd' => 38,
	  'f' => 39,
	  'g' => 40,
	  'h' => 41,
	  'j' => 42,
	  'k' => 43,
	  'l' => 44,
	  'q' => 45,
	  'w' => 46,
	  'e' => 47,
	  'r' => 48,
	  't' => 49,
	  'y' => 50,
	  'u' => 51,
	  'i' => 52,
	  'o' => 53,
	  'p' => 54,
	  'z' => 55,
	  'x' => 56,
	  'c' => 57,
	  'v' => 58,
	  'b' => 59,
	  'n' => 60,
	  'm' => 61,
	);
	private static $__dict_core_5_char_index = array (
	  'q' => 0,
	  'w' => 1,
	  'e' => 2,
	  'r' => 3,
	  't' => 4,
	  'y' => 5,
	  'u' => 6,
	  'i' => 7,
	  'o' => 8,
	  'p' => 9,
	  'a' => 10,
	  's' => 11,
	  'd' => 12,
	  'f' => 13,
	  'g' => 14,
	  'h' => 15,
	  'j' => 16,
	  'k' => 17,
	  'l' => 18,
	  'z' => 19,
	  'x' => 20,
	  'c' => 21,
	  'v' => 22,
	  'b' => 23,
	  'n' => 24,
	  'm' => 25,
	  0 => 26,
	  9 => 27,
	  8 => 28,
	  7 => 29,
	  6 => 30,
	  5 => 31,
	  4 => 32,
	  3 => 33,
	  2 => 34,
	  1 => 35,
	  'Q' => 36,
	  'W' => 37,
	  'E' => 38,
	  'R' => 39,
	  'T' => 40,
	  'Y' => 41,
	  'U' => 42,
	  'I' => 43,
	  'O' => 44,
	  'P' => 45,
	  'A' => 46,
	  'S' => 47,
	  'D' => 48,
	  'F' => 49,
	  'G' => 50,
	  'H' => 51,
	  'J' => 52,
	  'K' => 53,
	  'L' => 54,
	  'Z' => 55,
	  'X' => 56,
	  'C' => 57,
	  'V' => 58,
	  'B' => 59,
	  'N' => 60,
	  'M' => 61,
	);
	private static $__dict_core_6_char_index = array (
	  'A' => 0,
	  'S' => 1,
	  'D' => 2,
	  'F' => 3,
	  'G' => 4,
	  'H' => 5,
	  'J' => 6,
	  'K' => 7,
	  'L' => 8,
	  'Z' => 9,
	  'X' => 10,
	  'C' => 11,
	  'V' => 12,
	  'B' => 13,
	  'N' => 14,
	  'M' => 15,
	  'Q' => 16,
	  'W' => 17,
	  'E' => 18,
	  'R' => 19,
	  'T' => 20,
	  'Y' => 21,
	  'U' => 22,
	  'I' => 23,
	  'O' => 24,
	  'P' => 25,
	  'q' => 26,
	  'w' => 27,
	  'e' => 28,
	  'r' => 29,
	  't' => 30,
	  'y' => 31,
	  'u' => 32,
	  'i' => 33,
	  'o' => 34,
	  'p' => 35,
	  'a' => 36,
	  's' => 37,
	  'd' => 38,
	  'f' => 39,
	  'g' => 40,
	  'h' => 41,
	  'j' => 42,
	  'k' => 43,
	  'l' => 44,
	  'z' => 45,
	  'x' => 46,
	  'c' => 47,
	  'v' => 48,
	  'b' => 49,
	  'n' => 50,
	  'm' => 51,
	  1 => 52,
	  2 => 53,
	  3 => 54,
	  4 => 55,
	  5 => 56,
	  6 => 57,
	  7 => 58,
	  8 => 59,
	  9 => 60,
	  0 => 61,
	);

	private static $__dict_random_char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

	const DICT_CORE_NUM = 7;
	const DICT_CORE_BASE = 62;
	private static $__dict_core = null;
	private static $__dict_core_char_index = null;

	public static function export_core_dicts() {
		for ($r = 0; $r < self::DICT_CORE_NUM; $r++) {
			$ref = '__ref_dict_core_' . $r;
			$chars = str_replace(' ', '', self::$$ref);
			$dict = str_split($chars);
			$code = sprintf("private static \$__dict_core_%d = %s;\n", $r, var_export($dict, true));
			echo $code;
		}
		for ($r = 0; $r < self::DICT_CORE_NUM; $r++) {
			$ref = '__ref_dict_core_' . $r;
			$chars = str_replace(' ', '', self::$$ref);
			$dict = array_flip(str_split($chars));
			$code = sprintf("private static \$__dict_core_%d_char_index = %s;\n", $r, var_export($dict, true));
			echo $code;
		}
	}

	public static function get_encrypted_uss($uid, $timestamp, $pass_modify_time) {

		$components = array();

		$timestamp = intval($timestamp);
		if ($timestamp <= 0) return false;
		$components['timestamp_real'] = $timestamp;
		$timestamp += rand(1, 60);
		$components['timestamp_random_plus_60s'] = $timestamp;

		$r = $timestamp % self::DICT_CORE_NUM;
		$p = $r === 3 ? 4 : self::DICT_CORE_NUM - 1 - $r;
		$components['r'] = $r;
		$components['p'] = $p;
		$ref = '__dict_core_' . $r;
		self::$__dict_core = self::$$ref;

		$components['Er'] = '';
		$n = self::__get_random_char();
		$components['n'] = $n;
		$o = self::__get_random_char();
		$components['o'] = $o;
		$components['Er'] .= $n;
		$components['Er'] .= $o;
		$n = ord($n);
		$o = ord($o);

		$components['ETS_RAW'] = self::__encode($timestamp + $n + $o, false);
		$components['ETS'] = self::__encode($timestamp + $n + $o, true);
		$uid = substr(md5($uid . str_repeat($r, $r)), 0, 8);
		$components['UID_SUB_MD5'] = $uid;
		$components['EUID_SUM'] = 0;
		for ($i = 0; $i < 8; $i++) {
			$components['EUID_SUM'] += ord($uid{$i}) * ($i % 2 == 0 ? $n : $o);
		}
		$components['EUID_SUM'] += $components['timestamp_random_plus_60s'];
		$ref = '__dict_core_' . $p;
		self::$__dict_core = self::$$ref;
		$components['EUID_SUM_ENCODE_RAW'] = self::__encode($components['EUID_SUM'], false);
		$components['EUID_SUM_ENCODE'] = self::__encode($components['EUID_SUM'], true);

		$x = dechex($n + $o - $r);
		$x_encode = self::__encode_x($x);
		$components['Er'] .= $x_encode;

		$r1 = self::__get_exclusive_random(array($r, $p));
		$components['r1'] = $r1;
		$ref = '__dict_core_' . $r1;
		self::$__dict_core = self::$$ref;

		$components['Er1'] = '';
		$n1 = self::__get_random_char();
		$components['n1'] = $n1;
		$o1 = self::__get_random_char();
		$components['o1'] = $o1;
		$components['Er1'] .= $n1;
		$components['Er1'] .= $o1;
		$n1 = ord($n1);
		$o1 = ord($o1);

		$components['PMT'] = $pass_modify_time;
		$components['EPMT_RAW'] = self::__encode($pass_modify_time + $n1 + $o1, false);
		$components['EPMT'] = self::__encode($pass_modify_time + $n1 + $o1, true);
		$x1 = dechex($n1 + $o1 - $r1);
		$x1_encode = self::__encode_x($x1);
		$components['Er1'] .= $x1_encode;

		$components['random_tail'] = '';
		for ($i = 0; $i < 4; $i++) {
		    $components['random_tail'] .= self::__get_random_char();
		}
		return $components;
	}

	public static function get_decrypted_uss($uid, $encrypted_str) {

		$components = array();

		if (strlen($encrypted_str) != 48) return false;

		$ETS  = substr($encrypted_str, 0, 12);
		$Er   = substr($encrypted_str, 12, 4);
		$EUID = substr($encrypted_str, 16, 12);
		$Er1  = substr($encrypted_str, 28, 4);
		$EPMT = substr($encrypted_str, 32, 12);
		$n = ord($Er{0});
		$o = ord($Er{1});

		$r = self::__check_r($Er);
		if (false === $r) return false;
		$components['r'] = $r;
		$p = $r === 3 ? 4 : self::DICT_CORE_NUM - 1 - $r;
		$components['p'] = $p;
		$ref = '__dict_core_' . $r;
		self::$__dict_core = self::$$ref;
		$ref_char_index = '__dict_core_' . $r . '_char_index';
		self::$__dict_core_char_index = self::$$ref_char_index;

		$ETS = self::__get_raw_encode_str($ETS);
		$components['timestamp_random_plus_60s'] = self::__decode($ETS) - $n - $o;

		$uid = substr(md5($uid . str_repeat($r, $r)), 0, 8);
		$components['UID_SUB_MD5'] = $uid;
		$components['EUID_SUM'] = 0;
		for ($i = 0; $i < 8; $i++) {
			$components['EUID_SUM'] += ord($uid{$i}) * ($i % 2 == 0 ? $n : $o);
		}
		$components['EUID_SUM'] += $components['timestamp_random_plus_60s'];
		$ref = '__dict_core_' . $p;
		self::$__dict_core = self::$$ref;
		$components['EUID_SUM_ENCODE_RAW'] = self::__encode($components['EUID_SUM'], false);
		$components['EUID_SUM_ENCODE'] = self::__encode($components['EUID_SUM'], true);

		$EUID = self::__get_raw_encode_str($EUID);
		if ($components['EUID_SUM_ENCODE_RAW'] !== $EUID) return false;

		$n1 = ord($Er1{0});
		$o1 = ord($Er1{1});

		$r1 = self::__check_r($Er1);
		if (false === $r1) return false;
		$components['r1'] = $r1;
		$ref = '__dict_core_' . $r1;
		self::$__dict_core = self::$$ref;
		$ref_char_index = '__dict_core_' . $r1 . '_char_index';
		self::$__dict_core_char_index = self::$$ref_char_index;

		$EPMT = self::__get_raw_encode_str($EPMT);
		$components['PMT'] = self::__decode($EPMT) - $n1 - $o1;

		return $components;
	}

	private static function __check_r($Er) {
		$n = $Er{0};
		$o = $Er{1};
		$x_encode = substr($Er, 2, 2);
		$hex_x = self::__decode_x($x_encode);
		$x = hexdec($hex_x);
		$r = ord($n) + ord($o) - $x;
		if (($r < 0) || ($r >= self::DICT_CORE_NUM)) return false;
		return $r;
	}

	private static function __get_raw_encode_str($str) {
		$ret = '';
		for ($i = 0; isset($str{$i}); ) {
			$ret .= $str{$i};
			$i += 2;
		}
		return $ret;
	}

	private static function __get_random_char() {
		$i = rand(0, 61);
		return self::$__dict_random_char{$i};
	}

	private static function __encode($i, $add_random_char = false) {
		if ($i == 0) {
			return self::$__dict_core[0];
		}
		$result = array();
		while ($i > 0) {
			$result[] = self::$__dict_core[($i % self::DICT_CORE_BASE)] . ($add_random_char ? self::__get_random_char() : '');
			$i = floor($i / self::DICT_CORE_BASE);
		}
		$result = array_reverse($result);
		return join('', $result);
	}

	private static function __decode($input) {
		$i = 0;
		$input = str_split($input);
		foreach ($input as $char) {
			$pos = self::$__dict_core_char_index[$char];
			$i = $i * self::DICT_CORE_BASE + $pos;
		}
		return $i;
	}

	private static function __encode_x($x) {
		$ret = '';
		for ($i = 0; isset($x{$i}); $i++) {
			$char = $x{$i};
			switch ($char) {
				case 'a':
					$ret .= chr(rand(65, 74));
					break;
				case 'b':
					$ret .= chr(rand(75, 84));
					break;
				case 'c':
					$ret .= chr(rand(85, 90));
					break;
				case 'd':
					$ret .= chr(rand(97, 106));
					break;
				case 'e':
					$ret .= chr(rand(107, 116));
					break;
				case 'f':
					$ret .= chr(rand(117, 122));
					break;
				case '0':
				case '1':
				case '2':
				case '3':
				case '4':
				case '5':
				case '6':
				case '7':
				case '8':
				case '9':
					$ret .= $char; //0-9
					break;
			}
		}
		return $ret;
	}

	private static function __decode_x($x_encode) {
		$ret = '';
		for ($i = 0; isset($x_encode{$i}); $i++) {
			$char = $x_encode{$i};
			$char_dec = ord($char);
			if ($char_dec >= 48 && $char_dec <= 57) {
				$ret .= $char;
			} elseif ($char_dec >= 65 && $char_dec <= 74) {
				$ret .= 'a';
			} elseif ($char_dec >= 75 && $char_dec <= 84) {
				$ret .= 'b';
			} elseif ($char_dec >= 85 && $char_dec <= 90) {
				$ret .= 'c';
			} elseif ($char_dec >= 97 && $char_dec <= 106) {
				$ret .= 'd';
			} elseif ($char_dec >= 107 && $char_dec <= 116) {
				$ret .= 'e';
			} elseif ($char_dec >= 117 && $char_dec <= 122) {
				$ret .= 'f';
			}
		}
		return $ret;
	}

	private static function __get_exclusive_random($existed) {
		$all = range(0, self::DICT_CORE_NUM - 1);
		$selected = array_diff($all, $existed);
		$si = array_rand($selected);
		return $selected[$si];
	}
}

//ActiveBiUss::export_core_dicts();

/*
$start = microtime(1);
if (isset($argv[1]) && isset($argv[2])) {
	echo "DECODE >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
	$c = (array)ActiveBiUss::get_decrypted_uss($argv[1], $argv[2]);
	foreach ($c as $k => $v) {
		echo "$k\t$v\n";
	}
	echo "time consumed: " . (microtime(1) - $start) . " seconds\n";
	exit;
} elseif (isset($argv[1])) {
	echo "ENCODE >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
	$pass_modify_time = strtotime('today');
	//$c = ActiveBiUss::get_encrypted_uss($argv[1], time());
	$c = (array)ActiveBiUss::get_encrypted_uss($argv[1], strtotime('today'), $pass_modify_time);
	foreach ($c as $k => $v) {
		echo "$k\t$v\n";
	}
	echo "UID " . $argv[1] . "\n";
	echo $c['ETS'].$c['Er'].$c['EUID_SUM_ENCODE'].$c['Er1'].$c['EPMT'].$c['random_tail']."\n";
	echo "time consumed: " . (microtime(1) - $start) . " seconds\n";
}
*/
