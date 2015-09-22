<?php
class CustomSurvey {

    private $thisDatabaseReader;
    private $customSurveyID;
    private $title;
    private $imageName;
    private $mainContent;
    private $footer;

    const DEFAULT_CUSTOM_SURVEY = 1;

    public function __Construct(myDatabase $thisDatabaseR, $customSurveyID = self::DEFAULT_CUSTOM_SURVEY) {

        $this->thisDatabaseReader = $thisDatabaseR;

        $query = "SELECT pmkCustomSurveyID, fldTitle, fldImageName, fldMainContent, fldFooter ";
        $query .="FROM tblCustomSurvey ";
        $query .="WHERE pmkCustomSurveyID = ?";
        $data = array($customSurveyID);

        $results = $this->thisDatabaseReader->select($query, $data);

        if ($results) {
            $this->customSurveyID = $results[0]["pmkCustomSurveyID"];
            $this->title = $results[0]["fldTitle"];
            $this->imageName = $results[0]["fldImageName"];
            $this->mainContent = $results[0]["fldMainContent"];
            $this->footer = $results[0]["fldFooter"];
        } else {
            $this->customSurveyID = 1;
            $this->title = "Practice Integration Profile";
            $this->imageName = "pip.png";
            $this->mainContent = "<p>Enclosed is the Vermont Integration Profile, an organizational self-assessment survey operationalizing the ideas in C.J. Peek’s Lexicon of Collaborative Care (2013). It should take less than 10 minutes to complete. We suggest that it be rated both by the Medical Director and the Senior Behavioral Health Clinician and that the graphs for both be completed.</p>
                <p>This organizational survey measures the dimensions identified by C.J. Peek in his Lexicon of Integrated Care (AHRQxxxx). Thank you for participating. This survey has two purposes, one to assist you and your practice to assess where you are with your integration efforts, and second to use your results to improve the survey design. All information will be collected, analyzed and reported in a form that does not identify you or your practice.  Your responses to all questions asked is extremely important.</p>
                <p>In return for answering all questions in the survey, you will receive a graph of your practice profile on the dimensions of the measure. There is no cost to you or your practice for participation. You can choose whether or not to participate. The Vermont Integration Profile is still under development and we do not guarantee that your practice’s performance on the survey corresponds to evidence based practice or improved patient outcomes.</p>
                <p>If you have any questions or concerns about the project, please feel free to contact Dr. Rodger Kessler, Assistant Professor at the University of Vermont, at 802-656-4560 or Rodger.Kessler@med. uvm.edu.</p>
                <p>The UVM Institutional Review Board has reviewed this project. If you have any concerns about your rights in this study, please contact Nancy Stalnaker, the Director of the Research Protections Office at the University of Vermont at 802-656-5040.</p>";
            $this->footer = "<ul>
                <li>Rodger Kessler PhD ABPP</li>
                <li>Rodger.Kessler@med.uvm.edu</li>
                <li>S458 The Courtyard at Given</li>
                <li>89 Beaumont Ave.</li>
                <li>Burlington, VT 05405</li>
                <li>802.656.4560</li>
        </ul>

        <ul>
                <li>Juvena Hitt</li>
                <li>Juvena.Hitt@med.uvm.edu</li>
                <li>S467 The Courtyard at Given</li>
                <li>89 Beaumont Ave.</li>
                <li>Burlington, VT 05405</li>
                <li>802.656.4570</li>
        </ul>

        <ul>
                <li>Jon van Luling</li>
                <li>Jonathan.van-luling@med.uvm.edu</li>
                <li>S465 The Courtyard at Given</li>
                <li>89 Beaumont Ave.</li>
                <li>Burlington, VT 05405</li>
                <li>802.656.8261</li>
        </ul>";
        }
    }

// GETTERS
    public function getCustomSurveyID() {
        return $this->customSurveyID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getImageName() {
        return $this->imageName;
    }

    public function getMainContent() {
        return $this->mainContent;
    }

    public function getFooter() {
        return $this->footer;
    }

}
?>
