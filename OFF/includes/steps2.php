<?php
/**
 * Created by PhpStorm.
 * User: Khalil
 * Date: 30/08/2016
 * Time: 03:51
 */ ?>
<style>body {
        margin: 40px;
    }

    .stepwizard-step p {
        margin-top: 10px;
    }

    .process-row {
        display: table-row;
    }

    .process {
        display: table;
        width: 100%;
        position: relative;
    }

    .process-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .process-row:before {
        top: 50px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .process-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .process-step p {
        margin-top: 10px;

    }

    .btn-circle {
        width: 100px;
        height: 100px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>
<div class="container">
    <div class="process">
        <div class="process-row">
            <div class="process-step">
                <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i
                        class="fa fa-steam fa-3x"></i></button>
                <p style="text-align: center"><b>Sign-in with Steam</b></p>
            </div>
            <div class="process-step">
                <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i
                        class="fa fa-list fa-3x"></i></button>
                <p style="text-align: center"><b>Choose an Offer</b></p>
            </div>
            <div class="process-step">
                <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i
                        class="fa fa-check fa-3x"></i></button>
                <p style="text-align: center"><b>Complete the Offer</b></p>
            </div>
            <div class="process-step">
                <button type="button" class="btn btn-success btn-circle" disabled="disabled"><i
                        class="fa fa-key fa-3x"></i></button>
                <p style="text-align: center"><b>Get your Key</b></p>
            </div>
        </div>
    </div>
</div>