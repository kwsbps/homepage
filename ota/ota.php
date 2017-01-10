<?php

/*
//################################################################################ 
//# 서버호스트명확인 API
//# :오픈플랫폼서버에인증키발급요청시필요한서버호스트명정보
//#
//# - UNIX: hostname 명령어로확인가능
//# - Windows : hostname 명령어로확인가능
//################################################################################
*/
$EOTA_hostName = EOTA_GetHostName();
/* echo "EOTA_GetHostName() : [ $EOTA_hostName ]<br>"; */

/*
//################################################################################ 
//# 서버 Mac Address 확인 API
//# :오픈플랫폼서버에인증키발급요청시필요한서버 Mac주소정보
//#
//# - UNIX: ifconfig명령어로확인가능
//# - Windows :ipconfig /all 명령어로확인가능
//################################################################################
*/
$EOTA_macAddress = EOTA_GetMacAddress();
/* echo "EOTA_GetMacAddress() : [ $EOTA_macAddress ]<br>"; */


$apiNm = "001";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="./js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="./js/json2.js"></script>
<script type="text/javascript" >

var API_LIST = [];
var apiIndex = 0;

$(document).ready(function(){

    var IsTuno = getDate() + "000001";
    var Tsymd = getDate("yyyyMMdd");
    var Trtm  = getDate().substring(8);
   
    //=========================================
    // API 정의
    //=========================================
    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "OpenFinAccountARS",           ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",                   ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "DrtrRgyn"     :   "Y",                                 ';  // 출금이체 등록 여부
    inputJson += '\n    "BrdtBrno"     :   "19790309",                          ';  // 생년월일(사업자번호)
    inputJson += '\n    "Tlno"         :   "00000000000"                       ';  // 전화번호
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_ofa_01_c001 핀-어카운트 ARS발급",input:inputJson});

    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "CheckOpenFinAccount",      ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "Rgno"        :   "20150813000112324",                  ';  // 거래고유번호
    inputJson += '\n    "BrdtBrno"    :   "19790309",                           ';  // 생년월일(사업자번호)
    inputJson += '\n    "Tlno"        :   "00000000000"                         ';  // 전화번호
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_tdt_01_r001 핀-어카운트 ARS발급 확인",input:inputJson});
    
    var inputJson = "";
    inputJson += ' {                                                          ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "OpenFinAccountDirect",     ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "DrtrRgyn"     :   "Y",                                 ';  // 출금이체 등록 여부
    inputJson += '\n    "BrdtBrno"     :   "19790309",                          ';  // 생년월일(사업자번호)
    inputJson += '\n    "Bncd"         :   "010",                               ';  // 은행코드
    inputJson += '\n    "Acno"         :   "36812175440"                       ';  // 계좌번호
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_ofa_02_c001 핀-어카운트 직접발급",input:inputJson});
    
    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "CheckOpenFinAccountDirect",';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "Rgno"        :    "20150818000112324",                 ';  // 거래고유번호
    inputJson += '\n    "BrdtBrno"    :    "19661010"                           ';  // 생년월일(사업자번호)
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_tdt_02_r001 핀-어카운트 직접발급 확인",input:inputJson});
    
    
    var inputJson = "";
    inputJson += ' {                                                          ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "OpenFinAccountOwnERP",     ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "DrtrRgyn"     :   "Y",                                 ';  // 출금이체 등록 여부
    inputJson += '\n    "Bncd"         :   "010",                               ';  // 은행코드
    inputJson += '\n    "Acno"         :   "111317003390"                       ';  // 계좌번호
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_ofa_03_c001 핀-어카운트 직접발급 ERP구축형",input:inputJson});
    
    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "CheckOpenFinAccountOwnERP",';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "Rgno"        :    "20150818000112324"                  ';  // 거래고유번호
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_tdt_03_r001 핀-어카운트 직접발급확인 ERP구축형",input:inputJson});
    
    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "CloseFinAccount",              ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "FinAcno"      :   "0082010123450011234567891239",      ';  // 핀-어카운트
    inputJson += '\n    "Tlno"         :   "00000000000",                       ';  // 전화번호
    inputJson += '\n    "BrdtBrno"     :   "19790309"                           ';  // 생년월일(사업자번호)
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_rdt_01_u001 핀-어카운트 해지",input:inputJson});
    
    inputJson = "";
    inputJson += ' {                                                            ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "InquireFinAccountStatus", ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    },                                                      ';
    inputJson += '\n    "FinAcno"      :   "0082010123450011234567891239",      ';  // 핀-어카운트
    inputJson += '\n    "Tlno"         :   "00000000000",                       ';  // 전화번호
    inputJson += '\n    "BrdtBrno"     :   "19661010"                           ';  // 생년월일(사업자번호)
    inputJson += '\n }                                                          ';
    API_LIST.push({apiKorNm:"oapi_fachk_01_r001 핀-어카운트 상태조회",input:inputJson}); 
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "DrawingTransfer",              ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_FB_A",                    ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101450371460341450341542",      ';  // 핀-어카운트
        inputJson += '\n    "Tram"        :   "100",                              ';  // 거래금액
        inputJson += '\n    "DractOtlt"   :   "출금계좌인자내용",                   ';  // 출금계좌인자내용
        inputJson += '\n    "MractOtlt"   :   "입금계좌인자내용"                    ';  // 입금계좌인자내용
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_dt_01_c001 출금이체",input:inputJson});          
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckOnDrawingTransfer",       ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_FB_A",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101450371460341450341542",      ';  // 핀-어카운트
        inputJson += '\n    "Tram"        :   "100",                             ';  // 거래금액
        inputJson += '\n    "OrtrYmd"     :   "'+Tsymd+'",                           ';  // 원거래일자
        inputJson += '\n    "OrtrIsTuno"  :   "20151012143931000010"                  ';  // 원거래 기관거래고유번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_cdt_01_r001 출금이체 결과확인",input:inputJson});  
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "ReceivedTransferFinAccount",             ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_FB_C",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101450371460341450341542",       ';  // 핀-어카운트
        inputJson += '\n    "Tram"        :   "100",                             ';  // 거래금액
        inputJson += '\n    "DractOtlt"   :   "출금계좌인자내용",                           ';  // 출금계좌인자내용
        inputJson += '\n    "MractOtlt"   :   "입금계좌인자내용"                            ';  // 입금계좌인자내용
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_rt_01_c001 입금이체(핀-어카운트)",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "ReceivedTransferAccountNumber",             ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "01M_007_00",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Bncd"     :   "011",                                   ';  // 은행코드
        inputJson += '\n    "Acno"     :   "3010135072451",                             ';  // 계좌번호
        inputJson += '\n    "Tram"        :   "100",                             ';  // 거래금액
        inputJson += '\n    "DractOtlt"   :   "출금계좌인자내용",                           ';  // 출금계좌인자내용
        inputJson += '\n    "MractOtlt"   :   "입금계좌인자내용"                            ';  // 입금계좌인자내용
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_rt_02_c001 입금이체(계좌번호)",input:inputJson});         
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckOnReceivedTransfer",      ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_FB_C",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101450371460341450341542",       ';  // 핀-어카운트
        inputJson += '\n    "Tram"        :   "100",                             ';  // 거래금액
        inputJson += '\n    "OrtrYmd"     :   "'+Tsymd+'",                           ';  // 원거래일자
        inputJson += '\n    "OrtrIsTuno"  :   "20151012143931000014"                  ';  // 원거래 기관거래고유번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_crt_01_r001 입금이체 결과확인",input:inputJson});  
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckDepositorFinAccount",      ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                     ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101714591724561714561952",       ';  // 핀-어카운트
        inputJson += '\n    "Dpnm"         :   "꽃놀이가자",                             ';  // 예금주명
        inputJson += '\n    "BrdtBrno"     :   "19790309"                           ';  // 생년월일(사업자번호)
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icd_01_r001 예금주 실명확인(핀-어카운트)",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireDepositorFinAccount",             ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                     ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101714591724561714561952"        ';  // 핀-어카운트
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icd_02_r001 예금주 조회(핀-어카운트)",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckDepositorAccountNumber",  ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                     ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Bncd"     :   "010",                                  ';  // 은행코드
        inputJson += '\n    "Acno"     :   "36812175440",                           ';  // 계좌번호
        inputJson += '\n    "Dpnm"         :   "꽃놀이가자",                         ';  // 예금주명
        inputJson += '\n    "BrdtBrno"     :   "19790309"                           ';  // 생년월일(사업자번호)
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icd_03_r001 예금주 실명확인(계좌번호)",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireDepositorAccountNumber",             ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                     ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Bncd"     :   "010",                                  ';  // 은행코드
        inputJson += '\n    "Acno"     :   "36812175440"                           ';  // 계좌번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icd_04_r001 예금주 조회(계좌번호)",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireBalance",               ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101714591724561714561952"        ';  // 핀-어카운트
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icb_01_r001 잔액조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireTransactionHistory",    ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",             ';  // API서비스코드 
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinAcno"     :   "00820101714591724561714561952",       ';  // 핀-어카운트
        inputJson += '\n    "Insymd"      :   "'+Tsymd+'",                         ';  // 조회시작일자
        inputJson += '\n    "Ineymd"      :   "'+Tsymd+'",                         ';  // 조회종료일자
        inputJson += '\n    "TrnsDsnc"    :   "A",                                ';  // 거래구분  A:전체 M:입금 D:출금
        inputJson += '\n    "Lnsq"        :   "ASC",                              ';  // 정렬순서 
        inputJson += '\n    "PageNo"     :   "1",                                 ';  // 페이지번호(스킵건수)
        inputJson += '\n    "Dmcnt"       :   "100"                               ';  // 요청건수
        inputJson += '\n }                                                        ';
        API_LIST.push({apiKorNm:"oapi_icth_01_l001 거래내역조회",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireCashierCheck",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "ChisBncd"   :   "011",                                 ';  // 수표발행은행코드
        inputJson += '\n    "CschNo"     :   "00000086",                            ';  // 자기앞수표번호
        inputJson += '\n    "Psymd"      :   "20150821",                            ';  // 발행일자
        inputJson += '\n    "CschCtblCd" :   "13",                                  ';  // 자기앞수표권종코드
        inputJson += '\n    "ChisGicd"   :   "113683",                              ';  // 수표발행지로코드
        inputJson += '\n    "ChisBrcd"   :   "000000",                              ';  // 수표발행지점코드
        inputJson += '\n    "ChPvamt"    :   "100000"                               ';  // 수표액면금액
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_ith_01_r001 자기앞수표 조회(당행)",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireCashierCheck",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "ChisBncd"   :   "062",                                 ';  // 수표발행은행코드
        inputJson += '\n    "CschNo"     :   "00001001",                            ';  // 자기앞수표번호
        inputJson += '\n    "Psymd"      :   "20040122",                            ';  // 발행일자
        inputJson += '\n    "CschCtblCd" :   "13",                                  ';  // 자기앞수표권종코드
        inputJson += '\n    "ChisGicd"   :   "0621007",                              ';  // 수표발행지로코드
        inputJson += '\n    "ChisBrcd"   :   "000000",                              ';  // 수표발행지점코드
        inputJson += '\n    "ChPvamt"    :   "100000"                               ';  // 수표액면금액
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_ith_01_r001 자기앞수표 조회(타행)",input:inputJson}); 
  
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireExchangeRate",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_D",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Btb"      :   "0000",                                    ';  // 고시회차
        inputJson += '\n    "Crcd"     :   "USD",                                   ';  // 통화코드
        inputJson += '\n    "Inymd"    :   "'+Tsymd+'"                              ';  // 조회일자
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_icc_01_r001 환율조회",input:inputJson});      
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "OpenFinCardARS",           ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Brdt"              :   "19661012",                     ';  // 생년월일(사업자번호)
        inputJson += '\n    "Tlno"              :   "00000000000"                   ';  // 전화번호
        //inputJson += '\n    "CrtcNo"       :   "12345"                              ';  // 인증번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_oca_01_c001 핀-카드 ARS발급",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckOpenFinCardARS",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Rgno"         :   "20150923213122000001",              ';  // 거래고유번호
        inputJson += '\n    "Brdt"         :   "20150902",                          ';  // 생년월일(사업자번호)
        inputJson += '\n    "Tlno"         :   "00000000000"                        ';  // 전화번호
        //inputJson += '\n    "CrtcNo"       :   "12345"                              ';  // 인증번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_ioc_01_r001 핀-카드 ARS발급 확인",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "OpenFinCardDirect",            ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Brdt"          :   "19661010",                         ';  // 생년월일(사업자번호)
        inputJson += '\n    "Cano"          :   "1234567890123456"                  ';  // 카드번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_oca_02_c001 핀-카드 직접발급",input:inputJson});        
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CheckOpenFinCardDirect",       ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Rgno"         :   "00829102846091622531612531629",     ';  // 등록번호
        inputJson += '\n    "Brdt"         :   "19661010"                           ';  // 생년월일(사업자번호)
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_ioc_02_r001 핀-카드 직접발급 확인",input:inputJson});      
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "CloseFinCard",           ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinCard"      :   "00829102846091622531612531629",     ';  // 핀카드
        inputJson += '\n    "Tlno"         :   "00000000000",                       ';  // 전화번호
        inputJson += '\n    "Brdt"         :   "19661010"                           ';  // 생년월일(사업자번호)
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_cca_01_u001 핀-카드 해지",input:inputJson});     
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "InquireFinCardStatus",           ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "FinCard"      :   "00829102846091622531612531629",     ';  // 핀카드
        inputJson += '\n    "Tlno"         :   "00000000000",                       ';  // 전화번호
        inputJson += '\n    "Brdt"         :   "19661010"                           ';  // 생년월일(사업자번호)
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_ios_01_r001 핀-카드 상태조회",input:inputJson});     
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCreditCardLimit",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "FinCard": "00829102256052266022256022357"                   ';  // 핀-카드
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_icl_01_r001 개인카드 한도조회",input:inputJson});
          
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCreditCardAuthorizationHistory",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "FinCard": "00829102256052266022256022357",                    ';  // 핀-카드
        inputJson += '\n "IousDsnc": "1",                    ';  // 국내외사용구분(1 : 국내, 2 : 해외)
        inputJson += '\n "Insymd": "'+Tsymd+'",                                        ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'",                                        ';  // 조회종료일자
        inputJson += '\n "PageNo": "1",                                               ';  // 페이지번호
        inputJson += '\n "Dmcnt": "15"                                                ';  // 요청건수
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_icah_01_l001 개인카드 승인내역조회",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCreditCardDemandSheetList",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "FinCard": "00829102256052266022256022357",                    ';  // 핀-카드
        inputJson += '\n "Insymd": "'+Tsymd+'",                                        ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'"                                         ';  // 조회종료일자
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_icdm_01_l001 개인카드 청구서목록조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCreditCardDemandSheetDetail",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "FinCard": "00829102256052266022256022357",                    ';  // 핀-카드
        inputJson += '\n "StlmDay": "'+Tsymd+'",                                        ';  // 결제일자
        inputJson += '\n "MmcrMmbrNo": "161302248154001",                   ';  // 회원사회원번호
        inputJson += '\n "DmshUnitNo": "001",                                         ';  // 청구서단위번호
        inputJson += '\n "Lnsq": "ASC",                                         ';  // 정렬순서
        inputJson += '\n "PageNo": "1",                                         ';  // 페이지번호
        inputJson += '\n "Dmcnt": "15"                                         ';  // 요청건수
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_icdh_01_r001 개인카드 청구서상세조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCorporationCardLimit",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Brno": "1238630208",                    ';  // 사업자등록번호
        inputJson += '\n "Cano": "4079160001839489",                   ';  // 카드번호
        inputJson += '\n "CardCmpCd": "16",                   ';  // 카드사코드
        inputJson += '\n "MmcrMmbrNo": "162002281612001"                   ';  // 회원사회원번호
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_iccl_01_r001 법인카드 한도조회",input:inputJson});  

        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCorporationCardList",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Brno": "1238630208",                    ';  // 사업자등록번호
        inputJson += '\n "PageNo": "1",                    ';  // 페이지번호
        inputJson += '\n "Dmcnt": "15"                    ';  // 요청건수
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_iccp_01_l001 법인카드 카드목록조회",input:inputJson});  
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCorporationCardAuthorizationHistory",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Brno": "1238630208",                    ';  // 사업자등록번호
        inputJson += '\n "Cano": "4079160001839489",                    ';  // 카드번호
        inputJson += '\n "CardCmpCd": "16",                   ';  // 카드사코드
        inputJson += '\n "MmcrMmbrNo": "162002281612001",                   ';  // 회원사회원번호
        inputJson += '\n "IousDsnc": "1",                   ';  // 국내외사용구분(1 : 국내, 2 : 해외)
        inputJson += '\n "Insymd": "'+Tsymd+'",                                        ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'",                                        ';  // 조회종료일자
        inputJson += '\n "PageNo": "1",                                               ';  // 페이지번호
        inputJson += '\n "Dmcnt": "15"                                                ';  // 요청건수
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_icca_01_l001 법인카드 승인내역조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCorporationCardDemandSheetList",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Brno": "1238630208",                    ';  // 사업자등록번호
        inputJson += '\n "Cano": "4079160001839489",                    ';  // 카드번호
        inputJson += '\n "CardCmpCd": "16",                   ';  // 카드사코드
        inputJson += '\n "MmcrMmbrNo": "162002281612001",                   ';  // 회원사회원번호
        inputJson += '\n "Insymd": "'+Tsymd+'",                                        ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'"                                         ';  // 조회종료일자
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_iccd_01_l001 법인카드 청구서목록조회",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "InquireCorporationCardDemandSheetDetail",          ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                           ';   // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_E",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Brno": "1238630208",                    ';  // 사업자등록번호
        inputJson += '\n "Cano": "4079160001839489",                    ';  // 카드번호
        inputJson += '\n "CardCmpCd": "16",                            ';  // 카드사코드
        inputJson += '\n "MmcrMmbrNo": "162002281612001",                   ';  // 회원사회원번호
        inputJson += '\n "StlmDay": "'+Tsymd+'",                                   ';  // 결제일자
        inputJson += '\n "DmshUnitNo": "001",                                          ';  // 청구서 단위번호
        inputJson += '\n "Lnsq": "ASC",                                                ';  // 정렬순서
        inputJson += '\n "PageNo": "1",                                               ';  // 페이지번호
        inputJson += '\n "Dmcnt": "15"                                                 ';  // 요청건수
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_iccs_01_r001 법인카드 청구서상세조회",input:inputJson});  
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveInstitutionAgreementInformation",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                       ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_assm1_01_l001 기관약정정보 조회",input:inputJson});
   

        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveFintechServiceAgreementCatalogue",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "123456",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                       ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_assm1_02_l001 핀테크서비스 약정목록 조회",input:inputJson}); 
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveFintechSerivceAgreementDetail",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "002",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                       ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_assm2_01_r001 핀테크서비스 약정상세 조회",input:inputJson});      
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAPIServiceAgreementCatalogue",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "123456",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                       ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_assm2_02_l001 API서비스 약정목록 조회",input:inputJson});        
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAPIServiceAgreementDetail",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "123456",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                       ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_assm3_01_r001 API서비스 약정상세 조회",input:inputJson});
       
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAgreementAccountBalances", ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_A",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    }                                                      ';
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_id_01_r001 약정계좌 잔액조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                          ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAgreementAccountTransactionHistory", ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",             ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Insymd"     :   "'+Tsymd+'",                        ';  // 조회시작일자
        inputJson += '\n    "Ineymd"     :   "'+Tsymd+'",                        ';  // 조회종료일자
        inputJson += '\n    "TrnsDsnc"   :   "A",                               ';  // 거래구분
        inputJson += '\n    "PageNo"     :   "1",                               ';  // 페이지번호(스킵건수)
        inputJson += '\n    "Dmcnt"      :   "100"                              ';  // 요청건수
        inputJson += '\n }                                                      ';
        API_LIST.push({apiKorNm:"oapi_ib_01_l001 약정계좌 거래내역조회",input:inputJson});      
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveFee",                  ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Insym"     :   "201511",                               ';  // 조회시작월
        inputJson += '\n    "Ineym"     :   "201511"                                ';  // 조회종료월
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_fee1_01_l001 수수료조회",input:inputJson});    
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAPIServiceFee",        ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "AskYm"     :   "201511"                                ';  // 청구년월
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_fee2_01_l001 상품별 수수료내역조회",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveDaySummation",            ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "123456",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Insymd": "'+Tsymd+'",                                         ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'"                                          ';  // 조회종료일자
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_smtn1_01_l001 일별 자금집계조회",input:inputJson});     

        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveRealTimeSummation",       ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    }                                                          ';
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_smtn2_01_l001 실시간 자금집계조회",input:inputJson});

        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAPITransactionHistory",';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Inymd"         :   "'+Tsymd+'",                         ';  // 조회일자
        inputJson += '\n    "InqyIsTuno"    :   "20151008153148000001"              ';  // 조회기관거래고유번호
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_motr1_01_r001 API API 거래내역 조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveInErrorTransaction",      ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Inymd": "'+Tsymd+'",                                          ';  // 조회일자
        inputJson += '\n "InqySttm": "'+Trtm+'"                                          ';  // 조회시작시각
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_motr2_01_l001 불능거래조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveIncompletionTransaction", ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    }                                                          ';
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_motr3_01_l001 미완료거래조회",input:inputJson});    
        

        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveAPIObstacle",             ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    }                                                          ';
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_motr4_01_l001 API 장애현황조회",input:inputJson});     
        
        inputJson = "";
        inputJson += ' {                                                            ';
        inputJson += '\n    "Header"   : {                                          ';
        inputJson += '\n        "ApiNm"         :   "RetrieveCloseFinAccount",      ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                    ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                   ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
        inputJson += '\n    },                                                      ';
        inputJson += '\n    "Insymd"     :   "'+Tsymd+'",                            ';  // 조회시작일자
        inputJson += '\n    "Ineymd"     :   "'+Tsymd+'"                             ';  // 조회종료일자
        inputJson += '\n }                                                          ';
        API_LIST.push({apiKorNm:"oapi_cfah_01_l001 핀-어카운트 해지내역조회",input:inputJson});
        
        inputJson = "";
        inputJson += ' {                                                               ';
        inputJson += '\n    "Header"   : {                                             ';
        inputJson += '\n        "ApiNm"         :   "RetrieveCloseFinCard",            ';  // API코드
        inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                       ';  // 전송일자
        inputJson += '\n        "Trtm"          :   "'+Trtm+'",                          ';  // 전송시각
        inputJson += '\n        "Iscd"          :   "000279",                          ';  // 기관코드
        inputJson += '\n        "FintechApsno"  :   "001",                             ';  // 핀테크앱일련번호
        inputJson += '\n        "ApiSvcCd"      :   "TEST_API_F",                      ';  // API서비스코드
        inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                       ';  // 기관거래고유번호
        inputJson += '\n    },                                                         ';
        inputJson += '\n "Insymd": "'+Tsymd+'",                                         ';  // 조회시작일자
        inputJson += '\n "Ineymd": "'+Tsymd+'"                                          ';  // 조회종료일자
        inputJson += '\n }                                                             ';
        API_LIST.push({apiKorNm:"oapi_ccah_01_l001 핀-카드 해지내역조회",input:inputJson});
        
       
        //=========================================
        //select box 표시
        //=========================================
        var apiList = document.getElementById("apiList");
        $("#apiList").html("");
        for(var i=0;i < API_LIST.length; i++){
            var apiNm = JSON.parse(API_LIST[i].input).Header.ApiNm;
            apiList.options[apiList.options.length] = new Option(""+API_LIST[i].apiKorNm+"",apiNm);
        }
        
        $("#input").val(API_LIST[0].input);
        $("#apiSvcId").val(API_LIST[0].apiKorNm);


        //=========================================
        // event
        //=========================================
        $("#apiList").change(function(e){
            var index = $("#apiList option").index($("#apiList option:selected"));
            $("#input").val(API_LIST[index].input);
            $("#apiSvcId").val(API_LIST[index].apiKorNm);
        });
        
        $("input[name=sendBtn]").click(function(e){
            sendServer();
        });
});

function sendServer(){
    $("#output").val("");
    
    var jsonData = $("#input").val();
    jsonData = encodeURIComponent(jsonData).replace(/\"/g,"%22").replace(/\'/g, "%27");

    $.ajax({
        url:"process.php?p=send",
        type:"POST",
        data:"JSONData="+jsonData,
        cache: false,
        success:function(dat){
            $("#output").val(dat);
        },
        error:function(){
            $("#output").val("ajax error");
        }
    });
}

function createInputJson(ApiNm, ApiSvcCd){
    var IsTuno = getDate() + "000001";
    inputJson = "";
    inputJson += ' {                                                          ';
    inputJson += '\n    "Header"   : {                                          ';
    inputJson += '\n        "ApiNm"         :   "",                             ';  // API코드
    inputJson += '\n        "Tsymd"         :   "'+Tsymd+'",                     ';  // 전송일자
    inputJson += '\n        "Trtm"          :   "'+Trtm+'",                       ';  // 전송시각
    inputJson += '\n        "Iscd"          :   "000279",                       ';  // 기관코드
    inputJson += '\n        "FintechApsno"  :   "001",                          ';  // 핀테크앱일련번호
    inputJson += '\n        "ApiSvcCd"      :   "DrawingTransferA",             ';  // API서비스코드
    inputJson += '\n        "IsTuno"        :   "'+IsTuno+'"                    ';  // 기관거래고유번호
    inputJson += '\n    }                                                       ';
    inputJson += '\n }                                                          ';
    return inputJson
}

function getDate(pattern){
    var result = "";
    var d = new Date();
    year = d.getFullYear();
    month = (d.getMonth() + 1);
    date = d.getDate();
    hours = d.getHours();
    minutes = d.getMinutes();
    seconds = d.getSeconds();
    
    if (month   < 10) month   = "0" + month;
    if (date    < 10) date    = "0" + date;
    if (hours   < 10) hours   = "0" + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;
    
    if(pattern && pattern == "yyyyMMdd"){
        result = year+""+month+""+date;
    }else{
        result = year+""+month+""+date+""+hours+""+minutes+""+seconds+"";
    }
    return result;
}
</script>
</head>
<body>
<H1>오픈플랫폼 API 테스트</H1>
API 전문 목록 : 
<div>
    <span>
        <select name="apiList" id="apiList">
        </select>
    </span>
    <span>
        <input name="apiSvcId" id="apiSvcId" style="width: 300px;" />
    </span>
</div>

<table style="width:100%;background-color:#ffffff;border:solid 0px #cccccc;margin:20px 0;font-size:11px;">
<colgroup>
    <col width="220"/>
    <col width="*"/>
</colgroup>
    <tr><td>ApiNm : API명(API영문명)</td><td>Rpcd : 응답코드</td></tr>
    <tr><td>Tsymd : 전송일자</td><td>Rsms : 응답메세지</td></tr>
    <tr><td>Trtm : 전송시각</td><td></td></tr>
    <tr><td>Iscd : 기관코드</td><td></td></tr>
    <tr><td>FintechApsno : 핀테크 앱 일련번호</td><td></td></tr>
    <tr><td>ApiSvcCd : API서비스코드</td><td></td></tr>
    <tr><td>IsTuno : 기관거래고유번호</td><td></td></tr>
</table>

<table style="width:100%;background-color:#eeeeee;border:solid 1px #cccccc;margin:20px 0;font-size:12px;">
<colgroup>
    <col width="150px;"/>
    <col width="*"/>
</colgroup>
    <tr>
        <td>hostname</td>
        <td><?php echo $EOTA_hostName; ?></td>
    </tr>
    <tr>
        <td>macAddress</td>
        <td><?php echo $EOTA_macAddress; ?></td>
    </tr>
</table>

<table style="width:100%;margin: 20px 0;background-color:#eeeeee;border:solid 1px #cccccc;">
<colgroup>
    <col width="150px;"/>
    <col width="*"/>
</colgroup>
    <tr>
        <td>전문 INPUT (JSON)</td>
        <td>
            <textarea name="input" id="input" style="width: 98%; height: 200px;"></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="button" name="sendBtn" value="전송 (token자동생성)"/></td>
    </tr>
    <tr>
        <td>전문 OUTPUT TEST</td>
        <td>
            <textarea name="output" id="output" style="width: 98%; height: 200px;"></textarea>
        </td>
    </tr>
</table>

</body>
</html>
