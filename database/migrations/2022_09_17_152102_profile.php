<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profile extends Migration
{
    public function up()
    {
        Schema::create('Profile', function (Blueprint $table) {
        $table->id('id');
        $table->string('Image')->nullable();    
        $table->date('DateOfApplication')->nullable();
        $table->date('DateHired')->nullable();
        $table->integer('userID')->nullable();
        $table->text('LastName')->nullable();
        $table->text('FirstName')->nullable();
        $table->text('MiddleName')->nullable();
        $table->text('Extension')->nullable();
        $table->text('MP')->nullable();
        $table->text('NickName')->nullable();
        $table->text('Position')->nullable();
        $table->string('Email')->nullable();
        $table->text('CurrentAddress')->nullable();
        $table->text('PermanentAddress')->nullable();
        $table->text('ContactNumber')->nullable();
        $table->text('ContactNumber2')->nullable();
        $table->text('ContactNumber3')->nullable();
        $table->text('ContactNumber4')->nullable();
        $table->text('Facebook')->nullable();
        $table->date('DateOfBirth')->nullable();
        $table->text('PlaceOfBirth')->nullable();
        $table->text('Nationality')->nullable();
        $table->integer('Age')->nullable();
        $table->text('Sex')->nullable();
        $table->text('Height')->nullable();
        $table->text('Weight')->nullable();
        $table->text('MaritalStatus')->nullable();
        $table->text('Religion')->nullable();
        $table->text('ColorOfEyes')->nullable();
        $table->text('Complexion')->nullable();
        $table->text('DistinguishingFeature')->nullable();
        $table->text('CPName')->nullable();
        $table->text('CPRelationship')->nullable();
        $table->text('CPAddress')->nullable();
        $table->text('CPContactNumber')->nullable();
        $table->text('CPContactNumber2')->nullable();
        $table->text('CPContactNumber3')->nullable();
        $table->text('CPContactNumber4')->nullable();
        $table->text('LicenseNumber')->nullable();
        $table->text('DateIssued')->nullable();
        $table->date('DateofExpiration')->nullable();
        $table->text('SSS')->nullable();
        $table->text('PagIbig')->nullable();
        $table->text('Philhealth')->nullable();
        $table->text('TIN')->nullable();
        $table->text('ElementaryNameofSchool')->nullable();
        $table->text('ElementaryLocation')->nullable();
        $table->text('ElementaryDateGraduated')->nullable();
        $table->text('HighSchoolNameofSchool')->nullable();
        $table->text('HighSchoolLocation')->nullable();
        $table->text('HighSchoolDateGraduated')->nullable();
        $table->text('CollegeNameofSchool')->nullable();
        $table->text('CollegeLocation')->nullable();
        $table->text('CollegeDateGraduated')->nullable();
        $table->text('CollegeCourse')->nullable();
        $table->date('EHDateofEmployment')->nullable();
        $table->date('EHDateStarted')->nullable();
        $table->text('EHDateEnded')->nullable();
        $table->text('EHCompanyNameAddress')->nullable();
        $table->text('EHContactNumbers')->nullable();
        $table->text('EHPosition')->nullable();
        $table->text('EHReasonofLeaving')->nullable();
        $table->date('EHDateStarted2')->nullable();
        $table->text('EHDateEnded2')->nullable();
        $table->text('EHCompanyNameAddress2')->nullable();
        $table->text('EHContactNumbers2')->nullable();
        $table->text('EHPosition2')->nullable();
        $table->text('EHReasonofLeaving2')->nullable();
        $table->date('EHDateStarted3')->nullable();
        $table->text('EHDateEnded3')->nullable();
        $table->text('EHCompanyNameAddress3')->nullable();
        $table->text('EHContactNumbers3')->nullable();
        $table->text('EHPosition3')->nullable();
        $table->text('EHReasonofLeaving3')->nullable();
        $table->date('EHDateStarted4')->nullable();
        $table->text('EHDateEnded4')->nullable();
        $table->text('EHCompanyNameAddress4')->nullable();
        $table->text('EHContactNumbers4')->nullable();
        $table->text('EHPosition4')->nullable();
        $table->text('EHReasonofLeaving4')->nullable();
        $table->date('EHDateStarted5')->nullable();
        $table->text('EHDateEnded5')->nullable();
        $table->text('EHCompanyNameAddress5')->nullable();
        $table->text('EHContactNumbers5')->nullable();
        $table->text('EHPosition5')->nullable();
        $table->text('EHReasonofLeaving5')->nullable();
        $table->date('EHDateStarted6')->nullable();
        $table->text('EHDateEnded6')->nullable();
        $table->text('EHCompanyNameAddress6')->nullable();
        $table->text('EHContactNumbers6')->nullable();
        $table->text('EHPosition6')->nullable();
        $table->text('EHReasonofLeaving6')->nullable();
        $table->date('EHDateStarted7')->nullable();
        $table->text('EHDateEnded7')->nullable();
        $table->text('EHCompanyNameAddress7')->nullable();
        $table->text('EHContactNumbers7')->nullable();
        $table->text('EHPosition7')->nullable();
        $table->text('EHReasonofLeaving7')->nullable();
        $table->date('EHDateStarted8')->nullable();
        $table->text('EHDateEnded8')->nullable();
        $table->text('EHCompanyNameAddress8')->nullable();
        $table->text('EHContactNumbers8')->nullable();
        $table->text('EHPosition8')->nullable();
        $table->text('EHReasonofLeaving8')->nullable();
        $table->date('EHDateStarted9')->nullable();
        $table->text('EHDateEnded9')->nullable();
        $table->text('EHCompanyNameAddress9')->nullable();
        $table->text('EHContactNumbers9')->nullable();
        $table->text('EHPosition9')->nullable();
        $table->text('EHReasonofLeaving9')->nullable();
        $table->date('EHDateStarted10')->nullable();
        $table->text('EHDateEnded10')->nullable();
        $table->text('EHCompanyNameAddress10')->nullable();
        $table->text('EHContactNumbers10')->nullable();
        $table->text('EHPosition10')->nullable();
        $table->text('EHReasonofLeaving10')->nullable();
        $table->text('FIFathersName')->nullable();
        $table->integer('FIFatherAge')->nullable();
        $table->text('FIFatherAddress')->nullable();
        $table->text('FIFatherOccupation')->nullable();
        $table->text('FIMothersMaidenName')->nullable();
        $table->integer('FIMotherAge')->nullable();
        $table->text('FIMotherAddress')->nullable();
        $table->text('FIMotherOccupation')->nullable();
        $table->text('FISiblingName')->nullable();
        $table->integer('FISiblingAge')->nullable();
        $table->text('FISiblingAddress')->nullable();
        $table->text('FISiblingOccupation')->nullable();
        $table->text('FISiblingName2')->nullable();
        $table->integer('FISiblingAge2')->nullable();
        $table->text('FISiblingAddress2')->nullable();
        $table->text('FISiblingOccupation2')->nullable();
        $table->text('FISiblingName3')->nullable();
        $table->integer('FISiblingAge3')->nullable();
        $table->text('FISiblingAddress3')->nullable();
        $table->text('FISiblingOccupation3')->nullable();
        $table->text('FISiblingName4')->nullable();
        $table->integer('FISiblingAge4')->nullable();
        $table->text('FISiblingAddress4')->nullable();
        $table->text('FISiblingOccupation4')->nullable();
        $table->text('FISiblingName5')->nullable();
        $table->integer('FISiblingAge5')->nullable();
        $table->text('FISiblingAddress5')->nullable();
        $table->text('FISiblingOccupation5')->nullable();
        $table->text('FISiblingName6')->nullable();
        $table->integer('FISiblingAge6')->nullable();
        $table->text('FISiblingAddress6')->nullable();
        $table->text('FISiblingOccupation6')->nullable();
        $table->text('FISpouseName')->nullable();
        $table->date('FISpouseDateofBirth')->nullable();
        $table->text('FISpouseAddress')->nullable();
        $table->date('FISpouseDatePalaceofMarriage')->nullable();
        $table->text('FISpouseOccupation')->nullable();
        $table->text('FIChildName')->nullable();
        $table->integer('FIChildAge')->nullable();
        $table->text('FIChildAddress')->nullable();
        $table->text('FIChildOccupation')->nullable();
        $table->text('FIChildName2')->nullable();
        $table->integer('FIChildAge2')->nullable();
        $table->text('FIChildAddress2')->nullable();
        $table->text('FIChildOccupation2')->nullable();
        $table->text('FIChildName3')->nullable();
        $table->integer('FIChildAge3')->nullable();
        $table->text('FIChildAddress3')->nullable();
        $table->text('FIChildOccupation3')->nullable();
        $table->text('FIChildName4')->nullable();
        $table->integer('FIChildAge4')->nullable();
        $table->text('FIChildAddress4')->nullable();
        $table->text('FIChildOccupation4')->nullable();
        $table->text('FIChildName5')->nullable();
        $table->integer('FIChildAge5')->nullable();
        $table->text('FIChildAddress5')->nullable();
        $table->text('FIChildOccupation5')->nullable();
        $table->text('FIChildName6')->nullable();
        $table->integer('FIChildAge6')->nullable();
        $table->text('FIChildAddress6')->nullable();
        $table->text('FIChildOccupation6')->nullable();
        $table->date('PRSBInclusiveDate')->nullable();
        $table->date('PRSBStarted')->nullable();
        $table->date('PRSBEnded')->nullable();
        $table->text('PRSBAddress')->nullable();
        $table->text('PRSBTypeofResidency')->nullable();
        $table->date('PRSBStarted2')->nullable();
        $table->date('PRSBEnded2')->nullable();
        $table->text('PRSBAddress2')->nullable();
        $table->text('PRSBTypeofResidency2')->nullable();
        $table->date('PRSBStarted3')->nullable();
        $table->date('PRSBEnded3')->nullable();
        $table->text('PRSBAddress3')->nullable();
        $table->text('PRSBTypeofResidency3')->nullable();
        $table->date('PRSBStarted4')->nullable();
        $table->date('PRSBEnded4')->nullable();
        $table->text('PRSBAddress4')->nullable();
        $table->text('PRSBTypeofResidency4')->nullable();
        $table->date('PRSBStarted5')->nullable();
        $table->date('PRSBEnded5')->nullable();
        $table->text('PRSBAddress5')->nullable();
        $table->text('PRSBTypeofResidency5')->nullable();
        $table->date('ODateofMembership')->nullable();
        $table->date('OStarted')->nullable();
        $table->date('OEnded')->nullable();
        $table->text('ONameofOrganization')->nullable();
        $table->text('OPosition')->nullable();
        $table->text('OLocation')->nullable();
        $table->date('OStarted2')->nullable();
        $table->date('OEnded2')->nullable();
        $table->text('ONameofOrganization2')->nullable();
        $table->text('OPosition2')->nullable();
        $table->text('OLocation2')->nullable();
        $table->date('OStarted3')->nullable();
        $table->date('OEnded3')->nullable();
        $table->text('ONameofOrganization3')->nullable();
        $table->text('OPosition3')->nullable();
        $table->text('OLocation3')->nullable();
        $table->text('CRCompleteName')->nullable();
        $table->text('CRAddress')->nullable();
        $table->text('CROccupation')->nullable();
        $table->text('CRContactNumber')->nullable();
        $table->text('CRCompleteName2')->nullable();
        $table->text('CRAddress2')->nullable();
        $table->text('CROccupation2')->nullable();
        $table->text('CRContactNumber2')->nullable();
        $table->text('CRCompleteName3')->nullable();
        $table->text('CRAddress3')->nullable();
        $table->text('CROccupation3')->nullable();
        $table->text('CRContactNumber3')->nullable();
        $table->text('ACDismissedForcedResign')->nullable();
        $table->text('ACInvestigatedArrestedDetained')->nullable();
        $table->text('ACInvestigatedArrestedDetainedViolation')->nullable();
        $table->text('ACFamilyInvestigatedArrestedDetained')->nullable();
        $table->text('ACWillingtobeAssigned')->nullable();
        $table->text('ACWillingtobeAssignedReason')->nullable();
        $table->text('ACLiquor')->nullable();
        $table->text('ACLiquorExtent')->nullable();
        $table->text('ACDrugs')->nullable();
        $table->text('ACDrugsExtent')->nullable();
        $table->text('HCHospitalization')->nullable();
        $table->text('HCOperation')->nullable();
        $table->text('HCPTB')->nullable();
        $table->text('HCHepatitis')->nullable();
        $table->text('HCAllergies')->nullable();
        $table->text('HCUTI')->nullable();
        $table->text('HCBronchialAsthma')->nullable();
        $table->text('HCDiabetes')->nullable();
        $table->text('HCHPN')->nullable();
        $table->text('HCOthers')->nullable();
        $table->text('SDAlcohol')->nullable();
        $table->text('SDCigarette')->nullable();
        $table->text('SDPresentMedication')->nullable();
        $table->text('SDPregnancy')->nullable();
        $table->text('SDAllTypesofWork')->nullable();
        $table->text('SDMinorAilmentAbnormality')->nullable();
        $table->text('SDMajorAilmentAbnormality')->nullable();
        $table->string('Sketch')->nullable(); 
    });
}
public function down()
{
    Schema::dropIfExists('profile');
}
}
