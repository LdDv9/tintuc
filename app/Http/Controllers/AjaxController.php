<?php

namespace App\Http\Controllers;

use App\LoaiTin;

class AjaxController extends Controller {
	public function getLoaiTin($idTheLoai) {
		$loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
		foreach ($loaitin as $list) {
			echo "<option value=' " . $list->id . " '> " . $list->Ten . " </option>";
		}
	}

}
