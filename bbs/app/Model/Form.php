<?php
class Form extends AppModel {
	public $name = 'Form';
	public $order = 'Form.order ASC';
	
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'admin_email' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'admin_name' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'admin_title' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'admin_header' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'admin_header' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'guest_title' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		),
		'guest_header' => array(
			'rule' => 'notEmpty',
			'message' => '必須項目です。'
		)
	);
	
	/*-----------------------------------------
	   独自タグをコードに変換
	-----------------------------------------*/
	
	/**
	 * type:text
	 */
	public function typeText($name, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="text" id="' . $name . '" name="' . $name . '" value="' . $session_data . '" class="cf-input-text" />' . "\n";
			return $output;
		} else {
			return $session_data;
		}
	}
	
	/**
	 * type:textarea
	 */
	public function typeTextarea($name, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<textarea id="' . $name . '" name="' . $name . '" class="cf-textarea">' . preg_replace('/\\\n/', "\n", $session_data) . '</textarea>' . "\n";
			return $output;
		} else {
			return preg_replace('/\\\n/', '<br />', $session_data);
		}
	}
	
	/**
	 * type:radio
	 */
	public function typeRadio($name, $value, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '';
			foreach ($value as $key => $val) {
				$output .= '<label class="cf-label-radio" for="' . $name . '_' . $key . '">';
				if ($session_data === $val) {
					$output .= '<input type="radio" id="' . $name . '_' . $key . '" name="' . $name . '" value="' . $val . '" class="cf-input-radio" checked="checked" />';
				} else {
					$output .= '<input type="radio" id="' . $name . '_' . $key . '" name="' . $name . '" value="' . $val . '" class="cf-input-radio" />';
				}
				$output .= $val . '</label>' . "\n";
			}
			return $output;
		} else {
			return $session_data === array() ? '' : $session_data;
		}
	}
	
	/**
	 * type:checkbox
	 */
	public function typeCheckbox($name, $value, $session_data) {
		$output = '';
		if ($this->request->params['action'] === 'index') {
			foreach ($value as $key => $val) {
				$output .= '<label class="cf-label-checkbox" for="' . $name . '_' . $key . '">';
				if (in_array($val, $session_data)) {
					$output .= '<input type="checkbox" id="' . $name . '_' . $key . '" name="' . $name . '[]" value="' . $val . '" class="cf-input-checkbox" checked="checked" />';
				} else {
					$output .= '<input type="checkbox" id="' . $name . '_' . $key . '" name="' . $name . '[]" value="' . $val . '" class="cf-input-checkbox" />';
				}
				$output .= $val . '</label>' . "\n";
			}
		} else {
			foreach ($session_data as $value) {
				$output .= $value . '&nbsp;';
			}
		}
		return $output;
	}
	
	/**
	 * type:select
	 */
	public function typeSelect($name, $value, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<select id="' . $name . '" name="' . $name . '" class="cf-select">' . "\n";
			foreach ($value as $key => $val) {
				if ($session_data === $val) {
					$output .= '<option value="' . $val . '" selected="selected">' . $val . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $val . '">' . $val . '</option>' . "\n";
				}
			}
			$output .= '</select>' . "\n";
			return $output;
		} else {
			return $session_data;
		}
	}
	
	/**
	 * type:file
	 */
	public function typeFile($name, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="file" id="' . $name . '" name="' . $name . '" class="cf-input-file" />' . "\n";
			return $output;
		} else {
			return $session_data === array() ? '' : $session_data;
		}
	}
	
	/**
	 * type:name
	 */
	public function typeName($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<span class="cf-span-name">姓 </span><input type="text" id="' . $name . '_1" name="' . $name . '[]" value="' . $session_data['0'] . '" class="cf-input-name" />' . "\n";
			$output .= '<span class="cf-span-name">名 </span><input type="text" id="' . $name . '_2" name="' . $name . '[]" value="' . $session_data['1'] . '" class="cf-input-name" />' . "\n";
			return $output;
		} else {
			return $session_data['0'] . '&nbsp;' . $session_data['1'];
		}
	}
	
	/**
	 * type:kana
	 */
	public function typeKana($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<span class="cf-span-name">セイ </span><input type="text" id="' . $name . '_1" name="' . $name . '[]" value="' . $session_data['0'] . '" class="cf-input-name" />' . "\n";
			$output .= '<span class="cf-span-name">メイ </span><input type="text" id="' . $name . '_2" name="' . $name . '[]" value="' . $session_data['1'] . '" class="cf-input-name" />' . "\n";
			return $output;
		} else {
			return $session_data['0'] . '&nbsp;' . $session_data['1'];
		}
	}
	
	/**
	 * type:mail
	 */
	public function typeMail($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="text" id="' . $name . '_1" name="' . $name . '[]" value="' . $session_data['0'] . '" class="cf-input-mail" /><br />' . "\n";
			$output .= '<input type="text" id="' . $name . '_2" name="' . $name . '[]" value="' . $session_data['1'] . '" class="cf-input-mail" />' . "\n";
			if (!empty($session_data['0']) && !empty($session_data['1'])) {
				$pattern = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)$/i';
				if (!preg_match($pattern, $session_data['0']) ||
					!preg_match($pattern, $session_data['1'])) {
					$output .= '<p class="cf-error"><span>*</span>メールアドレスの形式が不正です。もしくはシステムに対応していないメールアドレスです。</p>' . "\n";
					$this->error = true;
				}
				if ($session_data['0'] !== $session_data['1']) {
					$output .= '<p class="cf-error"><span>*</span>メールアドレスが一致しません。</p>' . "\n";
					$this->error = true;
				}
			}
			return $output;
		} else {
			return $session_data['0'];
		}
	}
	
	/**
	 * type:tel
	 */
	public function typeTel($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		$session_data['2'] = isset($session_data['2']) ? $session_data['2'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="text" id="' . $name . '_1" name="' . $name . '[]" value="' . $session_data['0'] . '" class="cf-input-tel" /> - ' . "\n";
			$output .= '<input type="text" id="' . $name . '_2" name="' . $name . '[]" value="' . $session_data['1'] . '" class="cf-input-tel" /> - ' . "\n";
			$output .= '<input type="text" id="' . $name . '_3" name="' . $name . '[]" value="' . $session_data['2'] . '" class="cf-input-tel" />' . "\n";
			if (!empty($session_data['0']) && !empty($session_data['1']) && !empty($session_data['2'])) {
				if (!preg_match('/^[0-9]+$/', $session_data['0']) || !preg_match('/^[0-9]+$/', $session_data['1']) || !preg_match('/^[0-9]+$/', $session_data['2'])) {
					$output .= '<p class="cf-error"><span>*</span>半角数字で入力してください。</p>' . "\n";
					$this->error = true;
				}
			}
			return $output;
		} else {
			return $session_data['0'] . '-' . $session_data['1'] . '-' . $session_data['2'];
		}
	}
	
	/**
	 * type:address
	 */
	public function typeAddress($name, $session_data) {
		$province = array(
			'', '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県',
			'群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県',
			'長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県',
			'和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県',
			'福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
		);
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		$session_data['2'] = isset($session_data['2']) ? $session_data['2'] : '';
		$session_data['3'] = isset($session_data['3']) ? $session_data['3'] : '';
		$session_data['4'] = isset($session_data['4']) ? $session_data['4'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<span class="cf-span-zip">〒 </span><input type="text" id="' . $name . '_1" name="' . $name . '[0]" value="' . $session_data['0'] . '" class="cf-input-zip" /> - ';
			$output .= '<input type="text" id="' . $name . '_2" name="' . $name . '[1]" value="' . $session_data['1'] . '" class="cf-input-zip" onKeyUp="AjaxZip3.zip2addr(\'' . $name . '[0]\', \'' . $name . '[1]\', \'' . $name . '[2]\', \'' . $name . '[3]\');" /><a href="http://www.post.japanpost.jp/zipcode/" class="cf-zip-link" target="_blank">郵便番号検索</a><br />' . "\n";
			$output .= '<span class="cf-span-address">都道府県 </span><select id="' . $name . '_3" name="' . $name . '[2]" class="cf-select">' . "\n";
			foreach ($province as $value) {
				if ($session_data['2'] === $value) {
					$output .= '<option value="' . $value . '" selected="selected">' . $value . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $value . '">' . $value . '</option>' . "\n";
				}
			}
			$output .= '</select><br />' . "\n";
			$output .= '<span class="cf-span-address">市区町村 </span><input type="text" id="' . $name . '_4" name="' . $name . '[3]" value="' . $session_data['3'] . '" class="cf-input-address" /><br />' . "\n";
			$output .= '<span class="cf-span-address">番地・建物名 </span><input type="text" id="' . $name . '_5" name="' . $name . '[4]" value="' . $session_data['4'] . '" class="cf-input-address" />' . "\n";
			if (!empty($session_data['0']) && !empty($session_data['1'])) {
				if (!preg_match('/^[0-9]{3}$/', $session_data['0']) && !preg_match('/^[0-9]{4}$/', $session_data['1'])) {
					$output .= '<p class="cf-error"><span>*</span>郵便番号を正しく入力してください。</p>' . "\n";
					$this->error = true;
				}
			}
			return $output;
		} else {
			return '〒' . $session_data['0'] . '-' . $session_data['1'] . '<br />' . $session_data['2'] . $session_data['3'] . $session_data['4'];
		}
	}
	
	/**
	 * type:ymd
	 */
	public function typeYmd($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		$session_data['2'] = isset($session_data['2']) ? $session_data['2'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<span class="cf-span-y">西暦 </span><input type="text" id="' . $name . '_1" name="' . $name . '[]" value="' . $session_data['0'] . '" class="cf-input-y" />' . "\n";
			$output .= '<select id="' . $name . '_2" name="' . $name . '[]" class="cf-select">' . "\n";
			for ($i = 1; $i < 13; $i++) {
				if ($session_data['1'] == $i) {
					$output .= '<option value="' . $i . '" selected="selected">' . $i . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $i . '">' . $i . '</option>' . "\n";
				}
			}
			$output .= '</select><span class="cf-span-md">月</span>' . "\n";
			$output .= '<select id="' . $name . '_3" name="' . $name . '[]" class="cf-select">' . "\n";
			for ($i = 1; $i < 32; $i++) {
				if ($session_data['2'] == $i) {
					$output .= '<option value="' . $i . '" selected="selected">' . $i . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $i . '">' . $i . '</option>' . "\n";
				}
			}
			$output .= '</select><span class="cf-span-md">日</span>' . "\n";
			if (!empty($session_data['0'])) {
				if (!preg_match('/^[0-9]{4}$/', $session_data['0'])) {
					$output .= '<p class="cf-error"><span>*</span>西暦を正しく入力してください。</p>' . "\n";
					$this->error = true;
				}
			}
			return $output;
		} else {
			return $session_data['0'] . '年' . $session_data['1'] . '月' . $session_data['2'] . '日';
		}
	}
	
	/**
	 * type:md
	 */
	public function typeMd($name, $session_data) {
		$session_data['0'] = isset($session_data['0']) ? $session_data['0'] : '';
		$session_data['1'] = isset($session_data['1']) ? $session_data['1'] : '';
		if ($this->request->params['action'] === 'index') {
			$output = '<select id="' . $name . '_1" name="' . $name . '[]" class="cf-select">' . "\n";
			for ($i = 1; $i < 13; $i++) {
				if ($session_data['0'] == $i) {
					$output .= '<option value="' . $i . '" selected="selected">' . $i . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $i . '">' . $i . '</option>' . "\n";
				}
			}
			$output .= '</select><span class="cf-span-md">月</span>' . "\n";
			$output .= '<select id="' . $name . '_2" name="' . $name . '[]" class="cf-select">' . "\n";
			for ($i = 1; $i < 32; $i++) {
				if ($session_data['1'] == $i) {
					$output .= '<option value="' . $i . '" selected="selected">' . $i . '</option>' . "\n";
				} else {
					$output .= '<option value="' . $i . '">' . $i . '</option>' . "\n";
				}
			}
			$output .= '</select><span class="cf-span-md">日</span>' . "\n";
			return $output;
		} else {
			return $session_data['0'] . '月' . $session_data['1'] . '日';
		}
	}
	
	/**
	 * type:get
	 */
	public function typeGet($name, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $session_data . '" class="cf-input-get" />' . "\n";
			$output .= $session_data;
			return $output;
		} else {
			return $session_data;
		}
	}
	
	/**
	 * type:post
	 */
	public function typePost($name, $session_data) {
		if ($this->request->params['action'] === 'index') {
			$output = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $session_data . '" class="cf-input-post" />' . "\n";
			if (preg_match('/\.gif$|\.png$|\.jpg$|\.jpeg$/i', $session_data)) {
				$output .= '<img src="' . $session_data . '" alt="イメージ画像" />';
			} else {
				$output .= $session_data;
			}
			return $output;
		} else {
			if (preg_match('/\.gif$|\.png$|\.jpg$|\.jpeg$/i', $session_data)) {
				return '<img src="' . $session_data . '" alt="イメージ画像" />';
			} else {
				return $session_data;
			}
		}
	}
}
