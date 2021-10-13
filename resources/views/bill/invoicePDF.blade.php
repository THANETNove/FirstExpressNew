<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>First Express</title>
    <style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }

    body {
        font-family: "THSarabunNew";
    }


    .invoice {
        position: absolute;
        margin-left: 520px;
        top: 0;
        font-size: 170%;
        color: blue;

    }

    .document-number {
        position: relative;
        margin-left: 450px;
        top: -250;
        font-size: 150%;
        color: blue;
    }

    .document-anuses {
        position: relative;
        margin-left: 450px;
        top: -275;
        font-size: 150%;
        color: blue;
    }

    .date {
        position: relative;
        margin-left: 600px;
        top: -465px;
        font-size: 150%;
        color: blue;
    }

    .date-anuses {
        position: relative;
        margin-left: 580px;
        top: -375;
        font-size: 150%;
        color: blue;
    }

    .customer {
        position: fixed;
        margin-left: 450px;
        top: 100;
        font-size: 150%;
        color: blue;
    }

    .customer-id {
        position: fixed;
        margin-left: 470px;
        top: 100;
        font-size: 150%;
        color: blue;
    }

    .agreement {
        position: fixed;
        margin-left: 600px;
        top: 100;
        font-size: 150%;
        color: blue;
    }

    .agreement-text {
        position: fixed;
        margin-left: 550px;
        top: 80;
        font-size: 150%;
        color: blue;
    }

    .company {
        position: absolute;
        margin-left: 0px;
        top: ;
        font-size: 150%;
        color: blue;

    }

    .charged {
        position: relative;
        margin-left: 0px;
        top: 60px;
        font-size: 150%;
        color: blue;
    }

    .text-company {
        position: relative;
        top: 5em;
        margin-top: -15px;
    }

    .text-charged {
        position: relative;
        margin-top: -15px;
        top: 50px;
    }

    .description {
        position: fixed;
        margin-left: 50px;
        top: 280;
        font-size: 150%;
        color: blue;
    }

    .description-text {
        position: fixed;
        margin-left: 0px;
        top: 330;
    }

    .amount {
        position: fixed;
        margin-left: 350px;
        top: 280;
        font-size: 150%;
        color: blue;
    }

    .amount-text {
        position: fixed;
        margin-left: 370px;
        top: 330;
    }

    .unit-price {
        position: fixed;
        margin-left: 450px;
        top: 280;
        font-size: 150%;
        color: blue;
    }

    .unit-price-text {
        position: fixed;
        margin-left: 460px;
        top: 330;
    }

    .amount-baht {
        position: fixed;
        margin-left: 590px;
        top: 280;
        font-size: 150%;
        color: blue;
    }

    .amount-baht-text {
        position: fixed;
        margin-left: 590px;
        top: 330;
    }

    .child3 {
        position: static;
        border: 1px solid red;
        top: 0px;
        margin-left: 400px;
    }

    .child3-text {
        position: static;
        margin-left: 20px;
    }

    .child3-baht {
        position: absolute;
        margin-left: 170px;
        top: 0px;
    }

    .child2 {
        position: relative;
        border: 1px solid red;
        top: -200px;
        margin-right: 310px;
        text-align: center;
    }

    .child4 {
        position: relative;
        text-align: center;
        margin-top: -50;
    }
    </style>
    <title>First Express</title>
</head>

<body>
    <div>
       <div>
        <p class="company">[บริษัท]</p>
        <p class="text-company">[ที่อยู่]</p>
        <p class="text-company">[จังหวัด รหัสไปรษณีย์]</p>
        <p class="text-company">[หมายเลขโทรศัพท์ (000) 000-0000]</p>
       </div>

        <p class="charged">เรียกเก็บไปยัง:</p>
        <p class="text-charged">{{$name}}</p>
        <p class="text-charged">[ชื่อบริษัท]</p>
        <p class="text-charged">[ที่อยู่]</p>
        <p class="text-charged">[จังหวัด รหัสไปรษณีย์]</p>
        <p class="text-charged">[หมายเลขโทรศัพท์]</p>
        <p class="text-charged">[ที่อยู่อิเมล]</p>

        <p class="invoice">ใบเเจ้งหนี้</p>
        <p class="document-number">หมายเลขเอกสาร</p>
        <p class="document-anuses">{{$documentThat}}</p>
        <p class="date">วันที่</p>
        <p class="date-anuses">{{$dateDue}}</p>
        <p class="customer">ID ลูกค้า</p>
        <p class="customer-id">{{$id}}</p>
        <p class="agreement">ข้อตกลง</p>
        <p class="agreement-text">ครบกำหนดเมื่อได้รับ</p>

        <p class="description">คำอธิบาย</p>
        <p class="amount">ปริมาณ</p>
        <p class="unit-price">ราคาต่อหน่วย</p>
        <p class="amount-baht">จำนวนเงิน</p>
        <div class="description-text">
            <p class="text-margin">ค่าบริการ</p>
            <p class="text-margin">เเรงงาน: 5 ชั่วโมง ฺ฿ 75/ ชั่วโมง</p>
            <p class="text-margin">ส่วนลดของ</p>
        </div>
        <div class="amount-text">
            <p class="text-margin">1</p>
            <p class="text-margin">5</p>
            <p class="text-margin">-</p>
        </div>
        <div class="unit-price-text">
            <p class="text-margin">2,010,000.00</p>
            <p class="text-margin">750.00</p>
            <p class="text-margin">70.00</p>
        </div>
        <div class="amount-baht-text">
            <p class="text-margin">2,010,000.00</p>
            <p class="text-margin">750.00</p>
            <p class="text-margin">70.00</p>
        </div>
    </div>
    <div class="child3">
        <div class="child3-text ">
            <p class="text-margin">ผลร่วมย่อย</p>
            <p class="text-margin">อัตราภาษี</p>
            <p class="text-margin">ภาษี</p>
            <h3 class="text-margin">ผลรวม</h3>
        </div>
        <div class="child3-baht">
            <p class="text-margin">2,010,000.00 บาท</p>
            <p class="text-margin">750.00 บาท</p>
            <p class="text-margin">70.00 บาท</p>
            <h3 class="text-margin"> 50,000,000.00 บาท</h3>
        </div>
    </div>
    <div class="child2">
        <h3>ขอบคุณที่ร่วมทำธุระกิจกับเรา!</h3>
    </div>
    <div class="child4">
        <h4>ถ้าคุณมีคำถามเกี่ยวใบเเจ้งหนี้นี้โปรติดต่อ</h4>
        <h3>ชื่อ หมายเลขโทรศัพท์ email@address.com</h3>
    </div>


</body>

</html>