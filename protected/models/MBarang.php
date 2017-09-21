<?php

/**
 * This is the model class for table "m_barang".
 *
 * The followings are the available columns in table 'm_barang':
 * @property integer $id
 * @property string $kode
 * @property string $no_isbn
 * @property string $judul
 * @property string $penyusun
 * @property integer $jumlah_stok
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property integer $penerbit_id
 * @property integer $golongan_id
 * @property integer $supplier_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 *
 * The followings are the available model relations:
 * @property MGolongan $golongan
 * @property MPenerbit $penerbit
 * @property MSupplier $supplier
 */
class MBarang extends CActiveRecord
{
	public $tgl_awal, $tgl_akhir;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MBarang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
					array('id, judul, jumlah_stok', 'required'),
					array('id, jumlah_stok, harga_beli, harga_jual, penerbit_id, golongan_id, supplier_id, create_login, update_login', 'numerical', 'integerOnly'=>true),
					array('kode, no_isbn, penyusun', 'length', 'max'=>100),
					array('create_time, update_time', 'safe'),
					// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode, no_isbn, judul, penyusun, jumlah_stok, harga_beli, harga_jual, penerbit_id, golongan_id, supplier_id, create_time, update_time, create_login, update_login', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
					'golongan' => array(self::BELONGS_TO, 'MGolongan', 'golongan_id'),
					'penerbit' => array(self::BELONGS_TO, 'MPenerbit', 'penerbit_id'),
					'supplier' => array(self::BELONGS_TO, 'MSupplier', 'supplier_id'),
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
					'id' => 'ID',
					'kode' => 'Kode',
					'no_isbn' => 'No Isbn',
					'judul' => 'Judul',
					'penyusun' => 'Penyusun',
					'jumlah_stok' => 'Jumlah Stok',
					'harga_beli' => 'Harga Beli',
					'harga_jual' => 'Harga Jual',
					'penerbit_id' => 'Penerbit',
					'golongan_id' => 'Golongan',
					'supplier_id' => 'Supplier',
					'create_time' => 'Create Time',
					'update_time' => 'Update Time',
					'create_login' => 'Create Login',
					'update_login' => 'Update Login',
				);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CdbCriteria that can return criterias.
	 */
	public function criteriaSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

				$criteria->compare('id',$this->id);
		$criteria->compare('LOWER(kode)',strtolower($this->kode),true);
		$criteria->compare('LOWER(no_isbn)',strtolower($this->no_isbn),true);
		$criteria->compare('LOWER(judul)',strtolower($this->judul),true);
		$criteria->compare('LOWER(penyusun)',strtolower($this->penyusun),true);
		$criteria->compare('jumlah_stok',$this->jumlah_stok);
		$criteria->compare('harga_beli',$this->harga_beli);
		$criteria->compare('harga_jual',$this->harga_jual);
		$criteria->compare('penerbit_id',$this->penerbit_id);
		$criteria->compare('golongan_id',$this->golongan_id);
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('LOWER(create_time)',strtolower($this->create_time),true);
		$criteria->compare('LOWER(update_time)',strtolower($this->update_time),true);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);

		return $criteria;
	}
        
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=$this->criteriaSearch();
                $criteria->limit=10;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
	public function searchPrint()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=$this->criteriaSearch();
		$criteria->limit=-1; 

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
	}
}