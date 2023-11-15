<?php

require_once __DIR__ . '/FormElement.php';

class Raporlar {
    public FormElement $id;
    public FormElement $member_name_surname;
    public FormElement $income_type;
    public FormElement $expense_type;
    public FormElement $month_payment;
    public FormElement $year;
    public FormElement $date;
    public FormElement $paid_amount;
    public FormElement $voucher_no;
    public FormElement $account_name;
    public FormElement $city;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->member_name_surname = new FormElement('member_name_surname');
        $this->income_type = new FormElement('income_type');
        $this->expense_type = new FormElement('expense_type');
        $this->month_payment = new FormElement('month_payment');
        $this->year = new FormElement('year');
        $this->date = new FormElement('date');
        $this->paid_amount = new FormElement('paid_amount');
        $this->voucher_no = new FormElement('voucher_no');
        $this->account_name = new FormElement('account_name');
        $this->city = new FormElement('city');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
