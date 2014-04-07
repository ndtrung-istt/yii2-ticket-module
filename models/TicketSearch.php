<?php

namespace vendor\istt\ticket\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\istt\ticket\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `vendor\istt\ticket\models\Ticket`.
 */
class TicketSearch extends Model
{
    public $id;
    public $title;
    public $type;
    public $customer_fullname;
    public $customer_company;
    public $customer_phone;
    public $customer_email;
    public $system;
    public $priority;
    public $detail;
    public $suggestion;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;
    public $requested_at;
    public $replied_at;
    public $fixed_begin;
    public $fixed_end;
    public $cause;
    public $solution;
    public $status;
    public $site;
    public $hardware_type;
    public $hardware_part;
    public $hardware_serial;

    public function rules()
    {
        return [
            [['id', 'type', 'priority', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['title', 'customer_fullname', 'customer_company', 'customer_phone', 'customer_email', 'system', 'detail', 'suggestion', 'requested_at', 'replied_at', 'fixed_begin', 'fixed_end', 'cause', 'solution', 'site', 'hardware_type', 'hardware_part', 'hardware_serial'], 'safe'],
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

    public function search($params)
    {
        $query = Ticket::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'type');
        $this->addCondition($query, 'customer_fullname', true);
        $this->addCondition($query, 'customer_company', true);
        $this->addCondition($query, 'customer_phone', true);
        $this->addCondition($query, 'customer_email', true);
        $this->addCondition($query, 'system', true);
        $this->addCondition($query, 'priority');
        $this->addCondition($query, 'detail', true);
        $this->addCondition($query, 'suggestion', true);
        $this->addCondition($query, 'created_at');
        $this->addCondition($query, 'created_by');
        $this->addCondition($query, 'updated_at');
        $this->addCondition($query, 'updated_by');
        $this->addCondition($query, 'requested_at');
        $this->addCondition($query, 'replied_at');
        $this->addCondition($query, 'fixed_begin');
        $this->addCondition($query, 'fixed_end');
        $this->addCondition($query, 'cause', true);
        $this->addCondition($query, 'solution', true);
        $this->addCondition($query, 'status');
        $this->addCondition($query, 'site', true);
        $this->addCondition($query, 'hardware_type', true);
        $this->addCondition($query, 'hardware_part', true);
        $this->addCondition($query, 'hardware_serial', true);
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
