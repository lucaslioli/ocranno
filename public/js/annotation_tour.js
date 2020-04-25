
    //initialize instance
    var enjoyhint_instance = new EnjoyHint({});

    //simple config. 
    //Only one step - highlighting(with description) "New" button 
    //hide EnjoyHint after a click on the button.
    var enjoyhint_script_steps = [
        {
            'next .navbar-all-brand' : "Welcome to OCRAnno! Let me guide you through its features." 
        },{
            'next .nav-link:eq(1)' : "You can see and edit your annotations by clicking on 'My Annotations'"
        },{
            'next .annotation-info' : "Here you see information about the sentence you are<br>"+
            "annotating, and your progress in the current page."
        },{
            'next #sentence' : "This is the orginal sentence extracted from the PDF on the left.<br>"+
            "<u>Tip:</u> You can use <text style='color: #00a6eb'>'Ctrl+F'</text> and search "+
            "for the sentence to identify <br>where it occurs on the page."
        },{
            'key #correction' : "This is the field where you can edit the sentence to correct it.<br>"+
            "Please, correct it (if necessary) and press 'TAB'<br> to continue the tour!",
            'keyCode': 9
        },{
            'next #observation' : "In this field, you can write a comment about the annotation,<br>if you wish."
        },{
            'next #btn-illgebible' : "Now, if the original document is of poor quality and impossible<br>"+
                "to read, you can classify it as illegible."
        },{
            'click #btn-submit' : "Finally, you can click on the 'Submit' button to save your<br>"+
                "annotation and complete the tour! Thanks!"
        }
    ];

    //set script config
    enjoyhint_instance.set(enjoyhint_script_steps);

    //run Enjoyhint script
    enjoyhint_instance.run();
