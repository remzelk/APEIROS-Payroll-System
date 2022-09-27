<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $profile=Profile::where('userID', $id)->firstOrFail();
        return view('Employee.Profile.index')->with('profile', $profile);
    }

    public function edit($id)
    {
        $profile = Profile::where('userID', $id)->firstOrFail();
        return view('Employee.Profile.edit')->with('profile', $profile);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'Sketch' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagename = time() . '-' . $request->input('LastName') . '.' . $request->file('Image')->extension();
        $sketchname = time() . '-' . $request->input('LastName') . '.' . $request->file('Sketch')->extension();
        $request->file('Image')->move(public_path('images'), $imagename);
        $request->file('Sketch')->move(public_path('sketch'), $sketchname);

        $profile = Profile::where('userID', $id)->firstOrFail();
        $profile->Image = $imagename;
        $profile->DateOfApplication = $request->input('DateOfApplication');
        $profile->DateHired = $request->input('DateHired');
        $profile->LastName = $request->input('LastName');
        $profile->FirstName = $request->input('FirstName');
        $profile->MiddleName = $request->input('MiddleName');
        $profile->Extension = $request->input('Extension');
        $profile->MP = $request->input('MP');
        $profile->NickName = $request->input('NickName');
        $profile->Position = $request->input('Position');
        $profile->Email = $request->input('Email');
        $profile->CurrentAddress = $request->input('CurrentAddress');
        $profile->PermanentAddress = $request->input('PermanentAddress');
        $profile->ContactNumber = $request->input('ContactNumber');
        $profile->ContactNumber2 = $request->input('ContactNumber2');
        $profile->ContactNumber3 = $request->input('ContactNumber3');
        $profile->ContactNumber4 = $request->input('ContactNumber3');
        $profile->Facebook = $request->input('Facebook');
        $profile->DateOfBirth = $request->input('DateOfBirth');
        $profile->PlaceOfBirth = $request->input('PlaceOfBirth');
        $profile->Nationality = $request->input('Nationality');
        $profile->Age = $request->input('Age');
        $profile->Sex = $request->input('Sex');
        $profile->Height = $request->input('Height');
        $profile->Weight = $request->input('Weight');
        $profile->MaritalStatus = $request->input('MaritalStatus');
        $profile->Religion = $request->input('Religion');
        $profile->ColorOfEyes = $request->input('ColorOfEyes');
        $profile->Complexion = $request->input('Complexion');
        $profile->DistinguishingFeature = $request->input('DistinguishingFeature');
        $profile->CPName = $request->input('CPName');
        $profile->CPRelationship = $request->input('CPRelationship');
        $profile->CPAddress = $request->input('CPAddress');
        $profile->CPContactNumber = $request->input('CPContactNumber');
        $profile->CPContactNumber2 = $request->input('CPContactNumber2');
        $profile->CPContactNumber3 = $request->input('CPContactNumber3');
        $profile->CPContactNumber4 = $request->input('CPContactNumber4');
        $profile->LicenseNumber = $request->input('LicenseNumber');
        $profile->DateIssued = $request->input('DateIssued');
        $profile->DateofExpiration = $request->input('DateofExpiration');
        $profile->SSS = $request->input('SSS');
        $profile->PagIbig = $request->input('PagIbig');
        $profile->Philhealth = $request->input('Philhealth');
        $profile->TIN = $request->input('TIN');
        $profile->ElementaryNameofSchool = $request->input('ElementaryNameofSchool');
        $profile->ElementaryLocation = $request->input('ElementaryLocation');
        $profile->ElementaryDateGraduated = $request->input('ElementaryDateGraduated');
        $profile->HighSchoolNameofSchool = $request->input('HighSchoolNameofSchool');
        $profile->HighSchoolLocation = $request->input('HighSchoolLocation');
        $profile->HighSchoolDateGraduated = $request->input('HighSchoolDateGraduated');
        $profile->CollegeNameofSchool = $request->input('CollegeNameofSchool');
        $profile->CollegeLocation = $request->input('CollegeLocation');
        $profile->CollegeDateGraduated = $request->input('CollegeDateGraduated');
        $profile->CollegeCourse = $request->input('CollegeCourse');
        $profile->EHDateofEmployment = $request->input('EHDateofEmployment');
        $profile->EHDateStarted = $request->input('EHDateStarted');
        $profile->EHDateEnded = $request->input('EHDateEnded');
        $profile->EHCompanyNameAddress = $request->input('EHCompanyNameAddress');
        $profile->EHContactNumbers = $request->input('EHContactNumbers');
        $profile->EHPosition = $request->input('EHPosition');
        $profile->EHReasonofLeaving = $request->input('EHReasonofLeaving');
        $profile->EHDateStarted2 = $request->input('EHDateStarted2');
        $profile->EHDateEnded2 = $request->input('EHDateEnded2');
        $profile->EHCompanyNameAddress2 = $request->input('EHCompanyNameAddress2');
        $profile->EHContactNumbers2 = $request->input('EHContactNumbers2');
        $profile->EHPosition2 = $request->input('EHPosition2');
        $profile->EHReasonofLeaving2 = $request->input('EHReasonofLeaving2');
        $profile->EHDateStarted3 = $request->input('EHDateStarted3');
        $profile->EHDateEnded3 = $request->input('EHDateEnded3');
        $profile->EHCompanyNameAddress3 = $request->input('EHCompanyNameAddress3');
        $profile->EHContactNumbers3 = $request->input('EHContactNumbers3');
        $profile->EHPosition3 = $request->input('EHPosition3');
        $profile->EHReasonofLeaving3 = $request->input('EHReasonofLeaving3');
        $profile->EHDateStarted4 = $request->input('EHDateStarted4');
        $profile->EHDateEnded4 = $request->input('EHDateEnded4');
        $profile->EHCompanyNameAddress4 = $request->input('EHCompanyNameAddress4');
        $profile->EHContactNumbers4 = $request->input('EHContactNumbers4');
        $profile->EHPosition4 = $request->input('EHPosition4');
        $profile->EHReasonofLeaving4 = $request->input('EHReasonofLeaving4');
        $profile->EHDateStarted5 = $request->input('EHDateStarted5');
        $profile->EHDateEnded5 = $request->input('EHDateEnded5');
        $profile->EHCompanyNameAddress5 = $request->input('EHCompanyNameAddress5');
        $profile->EHContactNumbers5 = $request->input('EHContactNumbers5');
        $profile->EHPosition5 = $request->input('EHPosition5');
        $profile->EHReasonofLeaving5 = $request->input('EHReasonofLeaving5');
        $profile->EHDateStarted6 = $request->input('EHDateStarted6');
        $profile->EHDateEnded6 = $request->input('EHDateEnded6');
        $profile->EHCompanyNameAddress6 = $request->input('EHCompanyNameAddress6');
        $profile->EHContactNumbers6 = $request->input('EHContactNumbers6');
        $profile->EHPosition6 = $request->input('EHPosition6');
        $profile->EHReasonofLeaving6 = $request->input('EHReasonofLeaving6');
        $profile->EHDateStarted7 = $request->input('EHDateStarted7');
        $profile->EHDateEnded7 = $request->input('EHDateEnded7');
        $profile->EHCompanyNameAddress7 = $request->input('EHCompanyNameAddress7');
        $profile->EHContactNumbers7 = $request->input('EHContactNumbers7');
        $profile->EHPosition7 = $request->input('EHPosition7');
        $profile->EHReasonofLeaving7 = $request->input('EHReasonofLeaving7');
        $profile->EHDateStarted8 = $request->input('EHDateStarted8');
        $profile->EHDateEnded8 = $request->input('EHDateEnded8');
        $profile->EHCompanyNameAddress8 = $request->input('EHCompanyNameAddress8');
        $profile->EHContactNumbers8 = $request->input('EHContactNumbers8');
        $profile->EHPosition8 = $request->input('EHPosition8');
        $profile->EHReasonofLeaving8 = $request->input('EHReasonofLeaving8');
        $profile->EHDateStarted9 = $request->input('EHDateStarted9');
        $profile->EHDateEnded9 = $request->input('EHDateEnded9');
        $profile->EHCompanyNameAddress9 = $request->input('EHCompanyNameAddress9');
        $profile->EHContactNumbers9 = $request->input('EHContactNumbers9');
        $profile->EHPosition9 = $request->input('EHPosition9');
        $profile->EHReasonofLeaving9 = $request->input('EHReasonofLeaving9');
        $profile->EHDateStarted10 = $request->input('EHDateStarted10');
        $profile->EHDateEnded10 = $request->input('EHDateEnded10');
        $profile->EHCompanyNameAddress10 = $request->input('EHCompanyNameAddress10');
        $profile->EHContactNumbers10 = $request->input('EHContactNumbers10');
        $profile->EHPosition10 = $request->input('EHPosition10');
        $profile->EHReasonofLeaving10 = $request->input('EHReasonofLeaving10');
        $profile->FIFathersName = $request->input('FIFathersName');
        $profile->FIFatherAge = $request->input('FIFatherAge');
        $profile->FIFatherAddress = $request->input('FIFatherAddress');
        $profile->FIFatherOccupation = $request->input('FIFatherOccupation');
        $profile->FIMothersMaidenName = $request->input('FIMotherMaidenName');
        $profile->FIMotherAddress = $request->input('FIMothersAddress');
        $profile->FIMotherAge = $request->input('FIMotherAge');
        $profile->FIMotherOccupation = $request->input('FIMotherOccupation');
        $profile->FISiblingName = $request->input('FISiblingName');
        $profile->FISiblingAge = $request->input('FISiblingAge');
        $profile->FISiblingAddress = $request->input('FISiblingAddress');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation');
        $profile->FISiblingName = $request->input('FISiblingName2');
        $profile->FISiblingAge = $request->input('FISiblingAge2');
        $profile->FISiblingAddress = $request->input('FISiblingAddress2');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation2');
        $profile->FISiblingName = $request->input('FISiblingName3');
        $profile->FISiblingAge = $request->input('FISiblingAge3');
        $profile->FISiblingAddress = $request->input('FISiblingAddress3');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation3');
        $profile->FISiblingName = $request->input('FISiblingName4');
        $profile->FISiblingAge = $request->input('FISiblingAge4');
        $profile->FISiblingAddress = $request->input('FISiblingAddress4');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation4');
        $profile->FISiblingName = $request->input('FISiblingName5');
        $profile->FISiblingAge = $request->input('FISiblingAge5');
        $profile->FISiblingAddress = $request->input('FISiblingAddress5');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation5');
        $profile->FISiblingName = $request->input('FISiblingName6');
        $profile->FISiblingAge = $request->input('FISiblingAge6');
        $profile->FISiblingAddress = $request->input('FISiblingAddress6');
        $profile->FISiblingOccupation = $request->input('FISiblingOccupation6');
        $profile->FISpouseName = $request->input('FISpouseName');
        $profile->FISpouseDateofBirth = $request->input('FISpouseDateofBirth');
        $profile->FISpouseAddress = $request->input('FISpouseAddress');
        $profile->FISpouseDatePalaceofMarriage = $request->input('FISpouseDatePalaceofMarriage');
        $profile->FISpouseOccupation = $request->input('FISpouseOccupation');
        $profile->FIChildName = $request->input('FIChildName');
        $profile->FIChildAge = $request->input('FIChildAge');
        $profile->FIChildAddress = $request->input('FIChildAddress');
        $profile->FIChildOccupation = $request->input('FIChildOccupation');
        $profile->FIChildName2 = $request->input('FIChildName2');
        $profile->FIChildAge2 = $request->input('FIChildAge2');
        $profile->FIChildAddress2 = $request->input('FIChildAddress2');
        $profile->FIChildOccupation2 = $request->input('FIChildOccupation2');
        $profile->FIChildName3 = $request->input('FIChildName3');
        $profile->FIChildAge3 = $request->input('FIChildAge3');
        $profile->FIChildAddress3 = $request->input('FIChildAddress3');
        $profile->FIChildOccupation3 = $request->input('FIChildOccupation3');
        $profile->FIChildName4 = $request->input('FIChildName4');
        $profile->FIChildAge4 = $request->input('FIChildAge4');
        $profile->FIChildAddress4 = $request->input('FIChildAddress4');
        $profile->FIChildOccupation4 = $request->input('FIChildOccupation4');
        $profile->FIChildName5 = $request->input('FIChildName5');
        $profile->FIChildAge5 = $request->input('FIChildAge5');
        $profile->FIChildAddress5 = $request->input('FIChildAddress5');
        $profile->FIChildOccupation5 = $request->input('FIChildOccupation5');
        $profile->FIChildName6 = $request->input('FIChildName6');
        $profile->FIChildAge6 = $request->input('FIChildAge6');
        $profile->FIChildAddress6 = $request->input('FIChildAddress6');
        $profile->FIChildOccupation6 = $request->input('FIChildOccupation6');
        $profile->PRSBInclusiveDate = $request->input('PRSBInclusiveDate');
        $profile->PRSBStarted = $request->input('PRSBStarted');
        $profile->PRSBEnded = $request->input('PRSBEnded');
        $profile->PRSBAddress = $request->input('PRSBAddress');
        $profile->PRSBTypeofResidency = $request->input('PRSBTypeofResidency');
        $profile->PRSBStarted2 = $request->input('PRSBStarted2');
        $profile->PRSBEnded2 = $request->input('PRSBEnded2');
        $profile->PRSBAddress2 = $request->input('PRSBAddress2');
        $profile->PRSBTypeofResidency2 = $request->input('PRSBTypeofResidency2');
        $profile->PRSBStarted3 = $request->input('PRSBStarted3');
        $profile->PRSBEnded3 = $request->input('PRSBEnded3');
        $profile->PRSBAddress3 = $request->input('PRSBAddress3');
        $profile->PRSBTypeofResidency3 = $request->input('PRSBTypeofResidency3');
        $profile->PRSBStarted4 = $request->input('PRSBStarted4');
        $profile->PRSBEnded4 = $request->input('PRSBEnded4');
        $profile->PRSBAddress4 = $request->input('PRSBAddress4');
        $profile->PRSBTypeofResidency4 = $request->input('PRSBTypeofResidency4');
        $profile->PRSBStarted5 = $request->input('PRSBStarted5');
        $profile->PRSBEnded5 = $request->input('PRSBEnded5');
        $profile->PRSBAddress5 = $request->input('PRSBAddress5');
        $profile->PRSBTypeofResidency5 = $request->input('PRSBTypeofResidency5');
        $profile->ODateofMembership = $request->input('ODateofMembership');
        $profile->OStarted = $request->input('OStarted');
        $profile->OEnded = $request->input('OEnded');
        $profile->ONameofOrganization = $request->input('ONameofOrganization');
        $profile->OPosition = $request->input('OPosition');
        $profile->OLocation = $request->input('OLocation');
        $profile->OStarted2 = $request->input('OStarted2');
        $profile->OEnded2 = $request->input('OEnded2');
        $profile->ONameofOrganization2 = $request->input('ONameofOrganization2');
        $profile->OPosition2 = $request->input('OPosition2');
        $profile->OLocation2 = $request->input('OLocation2');
        $profile->OStarted3 = $request->input('OStarted3');
        $profile->OEnded3 = $request->input('OEnded3');
        $profile->ONameofOrganization3 = $request->input('ONameofOrganization3');
        $profile->OPosition3 = $request->input('OPosition3');
        $profile->OLocation3 = $request->input('OLocation3');
        $profile->CRCompleteName = $request->input('CRCompleteName');
        $profile->CRAddress = $request->input('CRAddress');
        $profile->CROccupation = $request->input('CROccupation');
        $profile->CRContactNumber = $request->input('CRContactNumber');
        $profile->CRCompleteName2 = $request->input('CRCompleteName2');
        $profile->CRAddress2 = $request->input('CRAddress2');
        $profile->CROccupation2 = $request->input('CROccupation2');
        $profile->CRContactNumber2 = $request->input('CRContactNumber2');
        $profile->CRCompleteName3 = $request->input('CRCompleteName3');
        $profile->CRAddress3 = $request->input('CRAddress3');
        $profile->CROccupation3 = $request->input('CROccupation3');
        $profile->CRContactNumber3 = $request->input('CRContactNumber3');
        $profile->ACDismissedForcedResign = $request->input('ACDismissedForcedResign');
        $profile->ACInvestigatedArrestedDetained = $request->input('ACInvestigatedArrestedDetained');
        $profile->ACInvestigatedArrestedDetainedViolation = $request->input('ACInvestigatedArrestedDetainedViolation');
        $profile->ACFamilyInvestigatedArrestedDetained = $request->input('ACFamilyInvestigatedArrestedDetained');
        $profile->ACWillingtobeAssigned = $request->input('ACWillingtobeAssigned');
        $profile->ACWillingtobeAssignedReason = $request->input('ACWillingtobeAssignedReason');
        $profile->ACLiquor = $request->input('ACLiquor');
        $profile->ACLiquorExtent = $request->input('ACLiquorExtent');
        $profile->ACDrugs = $request->input('ACDrugs');
        $profile->ACDrugsExtent = $request->input('ACDrugsExtent');
        $profile->HCHospitalization = $request->input('HCHospitalization');
        $profile->HCOperation = $request->input('HCOperation');
        $profile->HCPTB = $request->input('HCPTB');
        $profile->HCHepatitis = $request->input('HCHepatitis');
        $profile->HCAllergies = $request->input('HCAllergies');
        $profile->HCUTI = $request->input('HCUTI');
        $profile->HCBronchialAsthma = $request->input('HCBronchialAsthma');
        $profile->HCDiabetes = $request->input('HCDiabetes');
        $profile->HCHPN = $request->input('HCHPN');
        $profile->HCOthers = $request->input('HCOthers');
        $profile->SDAlcohol = $request->input('SDAlcohol');
        $profile->SDCigarette = $request->input('SDCigarette');
        $profile->SDPresentMedication = $request->input('SDPresentMedication');
        $profile->SDPregnancy = $request->input('SDPregnancy');
        $profile->SDAllTypesofWork = $request->input('SDAllTypesofWork');
        $profile->SDMinorAilmentAbnormality = $request->input('SDMinorAilmentAbnormality');
        $profile->SDMajorAilmentAbnormality = $request->input('SDMajorAilmentAbnormality');
        $profile->Sketch = $sketchname;
        $profile->update();
        return view('Employee.Profile.index')->with('profile', $profile);
    }

    public function destroy($id)
    {
        //
    }
}
