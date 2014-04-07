<?php

namespace istt\ticket\models;

use Yii;
use yii\base\Exception;
use yii\web\HttpException;

/**
 * This is the model class for table "tbl_ticket".
 *
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property string $customer_fullname
 * @property string $customer_company
 * @property string $customer_phone
 * @property string $customer_email
 * @property string $system
 * @property integer $priority
 * @property string $detail
 * @property string $suggestion
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property string $requested_at
 * @property string $replied_at
 * @property string $fixed_begin
 * @property string $fixed_end
 * @property string $cause
 * @property string $solution
 * @property integer $status
 * @property string $site
 * @property string $hardware_type
 * @property string $hardware_part
 * @property string $hardware_serial
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ticket}}';
    }

    /**
    * @inheritdoc
    */
    public static function getDb(){
    	if (\Yii::$app->has('db') && \Yii::$app->db instanceof \yii\db\Connection)
    		return \Yii::$app->db;
    	else
    		return \Yii::$app->db;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type', 'priority', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['detail', 'suggestion', 'cause', 'solution'], 'string'],
            [['requested_at', 'replied_at', 'fixed_begin', 'fixed_end'], 'safe'],
            [['title', 'customer_fullname', 'customer_company', 'customer_phone', 'customer_email', 'system', 'site', 'hardware_type', 'hardware_part', 'hardware_serial'], 'string', 'max' => 255]
        ];
    }

    /**
     * Add extra behaviors
     */
    public function behaviors(){
    	return [
    		['class' => \yii\behaviors\BlameableBehavior::className()],
    		['class' => \yii\behaviors\TimestampBehavior::className()],
    	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ticket', 'ID'),
            'title' => Yii::t('ticket', 'Title'),
            'type' => Yii::t('ticket', 'Type'),
            'customer_fullname' => Yii::t('ticket', 'Customer Fullname'),
            'customer_company' => Yii::t('ticket', 'Customer Company'),
            'customer_phone' => Yii::t('ticket', 'Customer Phone'),
            'customer_email' => Yii::t('ticket', 'Customer Email'),
            'system' => Yii::t('ticket', 'System'),
            'priority' => Yii::t('ticket', 'Priority'),
            'detail' => Yii::t('ticket', 'Detail'),
            'suggestion' => Yii::t('ticket', 'Suggestion'),
            'created_at' => Yii::t('ticket', 'Created At'),
            'created_by' => Yii::t('ticket', 'Created By'),
            'updated_at' => Yii::t('ticket', 'Updated At'),
            'updated_by' => Yii::t('ticket', 'Updated By'),
            'requested_at' => Yii::t('ticket', 'Requested At'),
            'replied_at' => Yii::t('ticket', 'Replied At'),
            'fixed_begin' => Yii::t('ticket', 'Fixed Begin'),
            'fixed_end' => Yii::t('ticket', 'Fixed End'),
            'cause' => Yii::t('ticket', 'Cause'),
            'solution' => Yii::t('ticket', 'Solution'),
            'status' => Yii::t('ticket', 'Status'),
            'site' => Yii::t('ticket', 'Site'),
            'hardware_type' => Yii::t('ticket', 'Hardware Type'),
            'hardware_part' => Yii::t('ticket', 'Hardware Part'),
            'hardware_serial' => Yii::t('ticket', 'Hardware Serial'),
        ];
    }

    const TYPE_RMA = 1;
    const TYPE_CSR = 2;
    public static function typeOptions($i = NULL) {
        	$options = [
    			self::TYPE_RMA		=>	\Yii::t('app', 'YÊU CẦU BẢO HÀNH PHẦN CỨNG'),
    			self::TYPE_CSR			=>	\Yii::t('app', 'YÊU CẦU XỬ LÝ SỰ CỐ'),
        	];
        	if (is_null($i)) return $options;
        	elseif (array_key_exists($i, $options)) return $options[$i];
        	else return $i;
     }

     const STATUS_OPEN = 0;
     const STATUS_CLOSED = 1;
    public static function statusOptions($i = NULL) {
        	$options = [
    			self::STATUS_OPEN		=>	\Yii::t('app', 'Open'),
    			self::STATUS_CLOSED		=>	\Yii::t('app', 'Closed'),
        	];
        	if (is_null($i)) return $options;
        	elseif (array_key_exists($i, $options)) return $options[$i];
        	else return $i;
     }

     const PRIORITY_CRITICAL = 1;
    const PRIORITY_MAJOR = 2;
    const PRIORITY_MINOR = 3;
    const PRIORITY_QUESTION = 4;
    public static function priorityOptions($i = NULL) {
        	$options = [
    			self::PRIORITY_CRITICAL		=>	\Yii::t('app', 'Critical'),
    			self::PRIORITY_MAJOR			=>	\Yii::t('app', 'Major'),
    			self::PRIORITY_MINOR			=>	\Yii::t('app', 'Minor'),
    			self::PRIORITY_QUESTION		=>	\Yii::t('app', 'Technical Question'),
        	];
        	if (is_null($i)) return $options;
        	elseif (array_key_exists($i, $options)) return $options[$i];
        	else return $i;
     }

     /**
      * Set default values
      */
     public function init(){
     	$this->replied_at = $this->requested_at = date('Y-m-d H:i:s');
     	$this->fixed_begin = $this->fixed_end = date('Y-m-d H:i:s', strtotime("+2 days"));
     	return parent::init();
     }

     /*
      * Parse datetime to array of date and time
      */
     public function parseDate(){
     	$attrs = ['requested_at', 'replied_at', 'fixed_begin', 'fixed_end'];
     	foreach ($attrs as $a){
     		if (is_string($d = $this->getAttribute($a))){
     			$d = \DateTime::createFromFormat('Y-m-d H:i:s', $d);
     			if ($d){
	     			$this->setAttribute($a, ['date' => $d->format('Y-m-d'), 'time' => $d->format('H:i:s')]);
     			} else {
	     			$this->setAttribute($a, ['date' => date('Y-m-d'), 'time' => date('H:i:s')]);
     			}
     		}
     	}
     }

     /**
      * Merge back array of date and time to datetime
      */
     public function validateDate(){
     	$attrs = ['requested_at', 'replied_at', 'fixed_begin', 'fixed_end'];
     	foreach ($attrs as $a){
     		if (is_array($d = $this->getAttribute($a)) && array_key_exists('date', $d) && array_key_exists('time', $d)){
     			$fmt = ['Y-m-d H:i:s', 'Y-m-d H:i', 'Y-m-d H', 'Y-m-d '];
     			foreach ($fmt as $f){
	     			$date = \DateTime::createFromFormat($f, $d['date'] . ' ' . $d['time']);
	     			if (is_object($date)){
	     				$this->setAttribute($a, $date->format('Y-m-d H:i:s'));
	     				break;
	     			}
     			}
     		}
     	}
     }
}
