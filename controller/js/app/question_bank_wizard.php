    <script>

            $(document).ready(function () {
                
                

                  

                        prosloadquestionfrombanktoview();
             });


             $(document).ready(function () {



                        prosloadonboardingmodalcontreques();
            });


            //pros load onborading modal content here
             function prosloadonboardingmodalcontreques()
             {


                var prosloadisntitution = $('.abba-change-institution option:selected').val();



                    $.ajax({
                            type: 'POST',
                            url: '../../controller/scripts/owner/questionbank/prosverifyonboradingproscess.php',
                            data: {

                                prosloadinstitutionid:prosloadisntitution,

                            },
                            success: function (result) {
                                        

                                  if(result.trim() == '1')
                                  {

                                              $('#welcomeAI').modal('show');

                                  }else
                                  {

                                  }

                            }

                    });

                
             }
             //pros load onborading modal content here
             

             $("body").on("click", '#prosloadquestionintobank_btn', function () {

                prosloadquestionfrombanktoview();
                

             });


          //PROS LOAD QUESTION FROM BANK TO VIEW
             function  prosloadquestionfrombanktoview()
             {


                                                            
                        // Get Subject from Database
                        var sectionID = $('#prosloadsectionforquestion').val();
                        var ClassID = $('#prosgetclassid_load_question').val();
                        var campusID = $('.prosloadcampusforcampusload').val();
                        var prosloadisntitution = $('.abba-change-institution option:selected').val();
                        var prosloadterm = $('#prosloadtermforquestiondisplay').val();
                        var prosloadsession = $('#prosloadsessionforviewloadquestion').val();
                        var prosloadquestiontype = $('#prosloadquestiontypefromthebank').val();
                      
                       
                       
                        $('#prosloadquestioncontnt_questionprev').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');   

                       
                        
                        $.ajax({
                            type: 'POST',
                            url: '../../controller/scripts/owner/questionbank/get_all_questions.php',
                            data: {

                                prosloadinstitutionid:prosloadisntitution,
                                prosloadsession:prosloadsession,
                                prosloadterm:prosloadterm,
                                campusID:campusID,
                                ClassID:ClassID,
                                sectionID:sectionID,
                                prosloadquestiontype:prosloadquestiontype

                            },
                            success: function (result) {

                              
                            
                                if (result == '0'){

                                            $(document).ready(function () {
                                                $('#welcomeAI').modal('show');
                                            });
                    
                                }else{

                                    $(document).ready(function () {

                                        // $('#welcomeAI').modal('hide');
                                        $('#prosloadquestioncontnt_questionprev').html(result);



                                        $(document).ready(function(){
                                            var items = $(".prosloadfullquetionforquestion .prosloadcardinforquestion");
                                            var numItems = items.length;
                                            var perPage = parseInt(20);
                                            var prebtn = '<i class="fa fa-arrow-left"></i>';
                                            var nextbtn = '<i class="fa fa-arrow-right"></i>';
                                                
                                            items.slice(perPage).hide();

                                            $('#pros-questionpaginationcont').pagination({

                                                items: numItems,
                                                itemsOnPage: perPage,
                                                prevText: prebtn,
                                                nextText: nextbtn,
                                                onPageClick : function (pageNumber){
                                                    var showFrom = perPage * (pageNumber - 1);
                                                    var showTo = showFrom + perPage;
                                                    items.hide().slice(showFrom, showTo).show();
                                                }

                                            });
                                        });

                                        $('#pros-questionpaginationcont').show();

                                        $('.hide_show').click(function(){
                                            //get collapse content selector
                                            var collapse_content_selector = $(this).attr('href');

                                            //make the collapse content to be shown or hide
                                            var toggle_switch = $(this);
                                            $(collapse_content_selector).toggle(function(){
                                            if($(this).css('display')=='none'){
                                                //change the button label to be 'Show'
                                                toggle_switch.html('View Options');
                                            }else{
                                                //change the button label to be 'Hide'
                                                toggle_switch.html('Hide Options');
                                            }
                                            });
                                        });
                                    });      
                                }
                            }
                        });
                

             }
             //PROS LOAD QUESTION FROM BANK TO VIEW





            $(document).ready(function () {


                    $("body").on("change", '#prosloadsectionforquestion', function () {

                                    var prossetiongotten = $(this).val();
                                    var campusID = $('.prosloadcampusforcampusload').val();
                                    var prosloadisntitution = $('.abba-change-institution option:selected').val();
                                    

                                    if(prossetiongotten == 'NULL' || prossetiongotten == '' || prossetiongotten == '0')
                                    {
                                                $('#prosgetclassid_load_question').html('<option value="NULL">Select Section</option>');
                                    }else
                                    {

                                               $('#prosgetclassid_load_question').html('<option value="NULL">loading...</option>');

                                                $.ajax({
                                                        type: "POST",
                                                        url: "../../controller/scripts/owner/questionbank/prosloasclassofdeparmenttemmplateview.php",
                                                        data: { tari_get_stored_instituion_id: prosloadisntitution, campus_id:campusID,prossetiongotten:prossetiongotten},
                                                        //cache: false,
                                                        success: function (output) {
                                                        
                                                            $('#prosgetclassid_load_question').html(output);
                                                            
                                                        }
                                            });

                                        
                                    }

                        
                    });

            });


           
        $(document).ready(function () {

               
                var prosloadinstitutionid = $('.abba-change-institution option:selected').val();


                $('.prosloadcampusforcampusload').html('<option value="NULL">loading...</option>');


               

            //PROS LOAD campus HERE
                $.ajax({
                    type: 'POST',
                    url: '../../controller/scripts/owner/questionbank/prosloadquestioncampus.php',
                    data: {prosloadinstitutionid: prosloadinstitutionid},
                    success: function (result) {
                        $('.prosloadcampusforcampusload').html(result);

                    }
                });
         //PROS LOAD campus HERE



           //PROS LOAD TERM ON CAMPUS CHANGE AND SECTION

           $("body").on("change", '.prosloadcampusforcampusload', function () {

       

                   var campusID = $(this).val();
                   var prosloadisntitution = $('.abba-change-institution option:selected').val();
                  
                         

                    $('#prosloadtermforquestiondisplay').html('<option value="NULL">loading...</option>');
                    $('#prosloadsectionforquestion').html('<option value="NULL">loading...</option>');




                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/questionbank/prosloadtermforquestionset.php",
                        data: { campus_id:campusID },
                        //cache: false,
                        success: function (output) {
                        
                                $('#prosloadtermforquestiondisplay').html(output);


                        }
                    });



                  $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/questionbank/tari_get_section_directnew.php",
                    data: { tari_get_stored_instituion_id: prosloadisntitution, campus_id:campusID },
                    //cache: false,
                    success: function (output) {
                       
                        $('#prosloadsectionforquestion').html(output);

                         // Get Subject from Database
                    }
                });




                


                


            });





           
           
        


         //PROS LOAD TERM ON CAMPUS CHANGE AND SECTION




            $("#proceed").on("click", function () {
                $('#welcomeAI').modal('hide');

            // Global variables. For demo purposes.
            // This variables should be configurated on configuration.ini file.
            // Fore more information about custom configuration see http://www.wiris.com/plugins/docs/resources/configuration-table
            // We overwrite them in order to show the changes.

            // Specifies how the formulas are stored in the database.
            // On configuration.ini the name of the variable is wiriseditorsavemode.
            var saveMode;

            // Specifies how the images are displayed on the editor.
            // On configuration.ini the name of variable is wiriseditoreditmode.
            var editMode;

            /**
            * This method simulates how the formula rendering on a non editable area using JsPluginViewer (Preview tab)
            * and formulas are stored in the database (HTML tab).
            */
            function updateFunction() {
                updatePreview();
                updateHTMLCode();
            }

            function updatePreview() {
                // Using plugin custom method for retreving data.
                // This data is a raw data with the format defined by save mode (xml, image or base64 images).
                var data = getEditorData();

                // This div simulates a render page without any editor.
                var preview_div = document.getElementById("preview_div");
                // Setting data on preview div.
                preview_div.innerHTML = data;
                // Rendering data on preview using JsPluginViewer.
                if ('com' in window && 'wiris' in window.com && 'js' in window.com.wiris && 'JsPluginViewer' in window.com.wiris.js) {
                    // With this method all non-editable objects are parsed.
                    // com.wiris.js.JsPluginViewer.parseElement(element) can be used in order to parse a custom DOM element.
                    // com.wiris.JsPluginViewer are called on page load so is not necessary to call it explicitly (I'ts called to simulate a custom render).
                    com.wiris.js.JsPluginViewer.parseDocument();
                }
                // Set titles for images. For demo purposes.
                imgSetTitle(preview_div);
            }

            function updateHTMLCode(){
                var data = getEditorData();
                // Copy raw data to html view and formatting it. For demo porpouses.
                var data_code = (data.replace(/</g, "&lt;")).trim();;
                var htmlcode_div = document.getElementById("htmlcode_div");


                // This texts shows how WIRISplugins.js should be included.
                // Is text not javascript.
                // For demo purposes only.
                var jsExampleScript = '';
                if (saveMode == "xml") {
                    jsExampleScript += 'var js = document.createElement("script");\n';
                    jsExampleScript += 'js.type = "text/javascript";\n';
                    jsExampleScript += 'js.src = "WIRISplugins.js?viewer=image";\n';
                    jsExampleScript += 'document.head.appendChild(js);\n\n';
                }

                data_code =  jsExampleScript + data_code;
                htmlcode_div.innerHTML = htmlcode_div.innerHTML = "<pre class='wrs_inline'><code id='code_block' style='color:#e0e0e0'>" + data_code + "</code></pre>";
                highlightCode(data);
            }


            /**
            * Changes MathType integration save mode.
            * 1.- xml: default mode, stores formulas as mathml.
            * 2.- image: stores formulas as images.
            * 3.- base64: stores formulas as base64 images.
            *
            * This method is only for demo purposes. In order to
            * change save mode edit the configuration.ini file (wiriseditorsavemode variable).
            * See http://www.wiris.com/plugins/docs/resources/configuration-table for more information.
            */
            function changeMode(mode) {
                // Mathml mode.
                if (mode == 'xml') {
                    saveMode = 'xml';
                }
                // Image mode.
                else if (mode == 'image') {
                    saveMode = 'image';
                }
                // Base64 mode.
                else if (mode == 'base64') {
                    saveMode = 'base64';
                    // With this variable, formulas are stored as a base64 image on the database but showed with
                    // a showimage src on the editor.
                    editMode = "image";
                }
                // Updating Preview and HTML tabs.
                updateFunction();
            }

            /**
            * Reder params can be configured on the server side using configuration.ini file and //TODO @Manuel, what is 'Reder'?
            * wiriseditorparameters variable or on the client side using javascript. // TODO @Manuel, this is ok?
            * wiriseditorparameters is a valid JSON using the key and value parameters referenced here: http://www.wiris.com/editor/docs/reference/parameters
            * For example {toolbar:'quizzes',fontsize:'20px',backgroundColor:'#3B653D',color:'#FEFEFE'} changes the editor toolbar, the fontsize,
            * the background color and the formula color.
            */
            function setParameters() {
                // We set MathType Web parameters on editor_parameters textarea.
                var e = document.getElementById("editor_parameters");

                if (typeof _wrs_modalWindow != undefined) {
                    _wrs_modalWindow = undefined;
                }

                // Auxiliary method to check a valid JSON. For demo purposes only.
                if (checkValidJson()) {
                    var jsonParams = eval('[' + e.value + '][0]');
                    // Each text editor has a specific method. // TODO @Manuel, this is ok?
                    setParametersSpecificPlugin(jsonParams);
                }
            }

            /**
            * This code sets body in rtl mode when language is rtl
            **/
            if(typeof _wrs_int_langCode !== 'undefined') {
                if (_wrs_int_langCode == "ar" || _wrs_int_langCode == "he" ) {
                    document.body.style.direction = 'rtl';
                }
            }
            /**
            * When body is load, we set language value to select language element.
            **/
            window.addEventListener('DOMContentLoaded', function() {
                // When lang code is setted
                if (typeof _wrs_int_langCode !== 'undefined') {
                    var selectLang = document.getElementById('lang_select');
                    // If select exists
                    if (selectLang != 'undefined') {
                        selectLang.value = _wrs_int_langCode;
                    }
                }
            }, false);

            /**
            * Auxiliary functions. For demo purposes.
            */

            /**
            * Shows HTML tab. For demo purposes.
            */
            function displayHTML() {
                var preview_div = document.getElementById("preview_div");
                preview_div.style.display = "none";
                var htmlcode_div = document.getElementById("htmlcode_div");
                htmlcode_div.style.display = "block";
            }

            /**
            * Shows Preview tab. For demo purposes.
            */
            function displayPreview() {
                var preview_div = document.getElementById("preview_div");
                preview_div.style.display = "block";
                var htmlcode_div = document.getElementById("htmlcode_div");
                htmlcode_div.style.display = "none";
            }

            /**
            * Shows or hide demo advanced options. For demo purposes.
            */
            function advancedOptions() {
                if (document.getElementById('advanced_options_checkbox').checked) {
                    document.getElementById('advanced_options').style.display = "inherit";
                }
                else {
                    document.getElementById('advanced_options').style.display = "none";
                }
            }


            /**
            * Changes MathType integration language and - if it possible - WYSIWYG editor language. For demo purposes.
            */
            function changeLanguage() {
                var e = document.getElementById("lang_select");
                var lang = e.options[e.selectedIndex].value;
                var prevBox = document.getElementById('preview_div');

                // Choosing between rtl and ltr languages.
                if (lang == 'ar' || lang == 'he') {
                    prevBox.setAttribute('dir', 'rtl');
                } else {
                    prevBox.setAttribute('dir', 'ltr');
                }

                // We need to reset the WYSIWYG editor to change the language.
                // resetEditor(lang, getWirisEditorParameters());
                window.location.search = 'language=' + lang;
            }

            /**
            * Returns true if JSON declared on editor_parameters textarea is a valid JSON. If not
            * returns false. For demo purposes.
            * @return {bool}
            */
            function checkValidJson() {

                var notification = document.getElementById("notification_set_parameters");
                var button_set = document.getElementById("set_parameters");
                var text_area = document.getElementById("editor_parameters");
                var error = isValidJson(text_area.value);

                if (error == "") {
                    notification.className = "wrs_notification_valid";
                    notification.innerHTML = "Done";
                    return true;
                }
                else {
                    notification.className = "wrs_notification_invalid";
                    notification.innerHTML = "This is not a valid JSON";
                    return false;
                }
            }

            /**
            * Auxiliary function. Returns an empty string if a JSON has a valid format.
            * If not returns an error message. For demo purposes.
            * @param  {string}  json 	JSON string.
            * @return {string}
            */
            function isValidJson(json) {
                try {
                    var v1 = JSON.parse(JSON.stringify(eval('[' + json + '][0]')));
                    return "";
                }
                catch (e) {
                    return e.message;
                }
            }

            /**
            * Auxiliary function. Highlights demo technology logo. For demo purposes.
            */
            function activateTechLogo() {
                var wrs_tech = "php";
                var logo = document.getElementById(wrs_tech + "_logo");
                if (logo !== null) {
                    logo.style.opacity = 0.9;
                };
            }

            /**
            * Format database data in HTML tab. For demo porpouses.
            */
            function highlightCode() {

                var htmlcode_div = document.getElementById("htmlcode_div");

                var html_content = htmlcode_div.innerHTML;
                var open_highlight = "<pre class='language-xml wrs_inline' style='word-wrap:break-word;background-color:white'><code>";
                var close_highlight = "</code></pre>";

                if (saveMode == "xml") {

                    /* Format the MATH tags */

                    var indexs_end = html_content.getMatchIndices("&lt;/math&gt;");

                    for (var i = indexs_end.length - 1; i >= 0; i--) {
                        var actual_index_end = indexs_end[i] + 13;
                        html_content = html_content.splice(actual_index_end, 0, close_highlight);
                    }

                    var indexs_start = html_content.getMatchIndices("&lt;math");

                    for (var i = indexs_start.length - 1; i >= 0; i--) {
                        var actual_index_start = indexs_start[i];
                        html_content = html_content.splice(actual_index_start, 0, open_highlight);
                    }


                }
                else if (saveMode == "image" || saveMode == "base64") {

                    /* Format the IMG and BASE64 */
                    console.log("IMAGE MODE");

                    var indexs_start = html_content.getMatchIndices("&lt;img");
                    if (indexs_start == 0){
                        indexs_start = html_content.getMatchIndices("&lt;IMG");
                    }
                    var indexs_end = [];

                    for (var i = indexs_start.length - 1; i >= 0; i--) {
                        var actual_index_start = indexs_start[i];

                        for (var j = actual_index_start; j < html_content.length - 4; j++) {
                            if (html_content[j] == "&" && html_content[j+1] == "g" && html_content[j+2] == "t" && html_content[j+3] == ";"){
                                html_content = html_content.splice(j+4, 0, close_highlight);
                                break;
                            }
                        }

                        html_content = html_content.splice(actual_index_start, 0, open_highlight);
                    }

                }

                htmlcode_div.innerHTML = html_content;

                // Prism library. For demo purposes.
                Prism.highlightAll();
            }

            /**
            * Set atitles for images. For demo purposes.
            *
            */
            function imgSetTitle(preview_div) {
                var imgs = preview_div.getElementsByTagName("img");
                for (var i = 0; i < imgs.length; i++) {
                    imgs[i].title = imgs[i].alt;

                }
            }

            String.prototype.splice = function splice (idx, rem, str) {
                return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
            };

            String.prototype.getMatchIndices = function (find) {
                var indices = [], data, exp = (typeof find == 'string' ? new RegExp(find, 'g') : find);

                while ((data = exp.exec(this))) {
                    indices.push(data.index);
                }

                return indices.length ? indices : [];
            };

            // Set demo's initial state.
            try {
                // Use error-handling in case some resource is not available at the moment.
                activateTechLogo();	
                advancedOptions();
                displayPreview();
            } catch (error) {
                console.log('demo activation', error);
            } 
            /**
            * Creates a TinyMCE instance on "example" div.
            * @param {String} lang TinyMCE language. MathType integration read this variable to set the editor lang.
            * @param {String} mathTypeParameters JSON containing MathType Web parameters.
            */
            function createEditorInstance(lang, mathTypeParameters) {

                var dir = 'ltr';
                if (lang == 'ar' || lang == 'he'){
                    dir = 'rtl';
                }

                let tinyMCEConfiguration = {
                    selector: '.example',
                    height : 150,
                    auto_focus:true,
                    directionality : dir,
                    menubar : true,
                    plugins: 'tiny_mce_wiris | advcode | anchor | autolink | charmap | codesample | emoticons image link lists media searchreplace table visualblocks wordcount paste advlist autoresize autosave bbcode contextmenu directionality insertdatetime legacyoutput nonbreaking noneditable pagebreak preview print save spellchecker tabfocus template visualchars contextmenu',
                    extended_valid_elements: '*[.*]',
                    toolbar: 'bold italic underline | cut copy paste | undo redo | fontselect fontsizeselect | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
                    // autosave_restore_when_empty: true,
                    setup : function(ed)
                    {
                        ed.on('init', function()
                        {
                            this.getDoc().body.style.fontSize = '16px';
                            this.getDoc().body.style.fontFamily = 'Arial, "Helvetica Neue", Helvetica, sans-serif';
                        });
                    },
                    
                };

                if (typeof mathTypeParameters != 'undefined') {
                    tinyMCEConfiguration.mathTypeParameters = mathTypeParameters;
                }

                // This is done to test when the user doesn't initialize the editor with the language property.
                if (lang != 'en') {
                    tinyMCEConfiguration.language = lang;
                }

                tinymce.init(tinyMCEConfiguration);
            }

            function updateFunctionTimeOut() {
                setTimeout(function(){ updateFunction();}, 500);
            }

            // Creating TinyMCE demo instance.
            if (typeof _wrs_int_langCode !== 'undefined') {
                createEditorInstance(_wrs_int_langCode, {});
            } else {
                createEditorInstance('en', {});
            }

            /**
            * Getting data from editor using getContent TinyMCE method.
            * MathType formulas are parsed to save mode format (mathml, image or base64)
            * For more information see: http://www.wiris.com/es/plugins/docs/full-mathml-mode.
            * @return {String} TinyMCE parsed data.
            */
            function getEditorData() {
                return tinymce.get('.example').getContent();
            }

            /**
            * Changes dynamically mathTypeParameters TinyMCE config variable.
            * @param {Json} json_params MathType Web parameters.
            */
            function setParametersSpecificPlugin(mathTypeParameters) {
                var lang = tinyMCE.activeEditor.options.get('langCode');
                tinymce.EditorManager.execCommand('mceRemoveEditor',true, "example");
                createEditorInstance(lang, mathTypeParameters);
                _wrs_modalWindow = undefined;
            }

            /**
            * Gets mathTypeParameters from TinyMCE.
            * @return {Object} MathType Web parameters as JSON. An empty JSON if is not defined.
            */
            function getWirisEditorParameters() {
                if (tinyMCE.activeEditor.options.isRegistered('mathTypeParameters')) {
                    return tinyMCE.activeEditor.options.get('mathTypeParameters');
                }
                return {};
            }
            });
        });
    </script>



    
   
       




        <script>
        
        
        //                  $(document).ready(function () {

        //     var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();

        //     $.ajax({
        //         type: "POST",
        //         url: "../../controller/scripts/owner/questionbank/tari_get_campus.php",
        //         data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id },
        //         //cache: false,
        //         success: function (output) {

        //             // alert(output);

        //             $('#tari_display_campus').html(output);

        //             $(document).ready(function () {

        //             // hidden things
        //             $(".form-business").hide();
                  
        //             // next button
        //             $(".next").on({click: function () {
        //                     // select any card
        //                     var campus_id = $('.active-card').data('id');
        //                     var class_id =  $('[name="radio"]:checked').val();
        //                     // alert(class_id);
        //                     if (campus_id) {
        //                         $("#progressBar").find(".active").next().addClass("active");
        //                         $(this).parents(".row").fadeOut("slow", function () {
        //                             $(this).next(".row").fadeIn("slow");
        //                         });
                                
        //                     } else if(class_id){
        //                         $("#progressBar").find(".active").next().addClass("active");
        //                         $(this).parents(".row").fadeOut("slow", function () {
        //                             $(this).next(".row").fadeIn("slow");
        //                         });
        //                     }else{
        //                         $.wnoty({
        //                             type: 'warning',
        //                             message: 'Please Select a Class',
        //                             autohideDelay: 3000, // 5 seconds
        //                             position:'top-right',
        //                             autohide:true
        //                         });
                    
        //                     }
        //                 }
        //             });
        //             // back button
        //             $(".back").on({
        //                 click: function () {
        //                     $("#progressBar").find(".active").last().removeClass("active");
        //                     $(this).parents(".row").fadeOut("slow", function () {
        //                         $(this).prev(".row").fadeIn("slow");
        //                     });
        //                 }
        //             });
                   
        //             //Active card on click function
        //             $(".card").on({
        //                     click: function () {
        //                     $(this).toggleClass("active-card");
        //                     $(this).parent(".col").siblings().children(".card").removeClass("active-card");
        //                     }
        //             });
        //             //back to wizard
        //             $(".back-to-wizard").on({
        //                 click: function () {
        //                     location.reload(true);
        //                 }
        //             });
        //             });
        //                 }
        //     });

        // });
        
        
        
                         //Fetch Edit Question Direct
                        $('body').on('click', '#edit_question', function() {
                             

                               

                            $("#objective_edit_direct").hide('slow');
                            $("#theory_edit_direct").hide('slow');
                        
                            var questionID = $(this).data('id');
                            var questionCategory = $(this).data('cat');
                          

                            // alert(questionID);

                            var fd = new FormData();
                            
                            fd.append('questionID', questionID);
                            fd.append('questionCategory', questionCategory);



                        
                            

                            $("#load_question").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/questionbank/get_question_from_questionbank.php',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (result) {

                                    
                                

                                    $("#load_question").html(result);
                                
                                    var QuestionCategory = $('#QuestionCategory').val();
                                
                                
                                  

                                   

                                    if(QuestionCategory == 'Objective'){

                                        $("#objective_edit_direct").show('slow');
                                        $("#theory_edit_direct").hide('slow');

                                        var question_e = $('#qedit').val();
                                        var Aedit = $('#Aedit').val();
                                        var Bedit = $('#Bedit').val();
                                        var Cedit = $('#Cedit').val();
                                        var Dedit = $('#Dedit').val();
                                        var ansedit = $('#ansedit').val();


                                      


                                         
                                        // tinymce.get('myTextarea').setContent(htmlContent);

                                        tinymce.get("question_edit").setContent(question_e);
                                        tinymce.get("optionA_edit").setContent(Aedit);
                                        tinymce.get("optionB_edit").setContent(Bedit);
                                        tinymce.get("optionC_edit").setContent(Cedit);
                                        tinymce.get("optionD_edit").setContent(Dedit);

                                         $('#inlineFormCustomSelect_selected option').each(function() {
                                            if ($(this).val() === ansedit) {
                                                $(this).prop('selected', true);
                                            } else {
                                                $(this).prop('selected', false);
                                            }
                                        });

                                    }else{

                                            if(QuestionCategory == 'Theory'){



                                               
                                                

                                                $("#theory_edit_direct").show('slow');
                                                $("#objective_edit_direct").hide('slow');

                                                var question_em = $('#qedit2').val();

                                                 

                                               

                                                tinymce.get("tari_direct2").setContent(question_em);

                                            }
                                    }


                                    
                                
                                }
                            });
                            
                        });   



                        //PROS SUBMIT QUESTION FOR SUBMIT



                                
        //Edit Question Direct
        $('#Update_question_direct').on('click', function() {
                
                
                var questionID = $('#questionID_edit').val();
                var questionCategory = $('#QuestionCategory').val();
             


                tinyMCE.triggerSave();
               

                if(questionCategory == 'Objective'){

                    var question_edit = $('.question1').val();
                    var optionA_edit = $('.optionA1').val();
                    var optionB_edit = $('.optionB1').val();
                    var optionC_edit = $('.optionC1').val();
                    var optionD_edit = $('.optionD1').val();
                    var select_edit = $('select#inlineFormCustomSelect_selected').val();

                 


                    if(question_edit == "" || optionA_edit == "" || optionB_edit == "" || optionC_edit == ""|| optionD_edit == "" || select_edit == "") {
                  
                        $.wnoty({
                            type: 'warning',
                            message: 'Please Fill all Question Fields',
                            autohideDelay: 3000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                    }
                    else{

                        var fd = new FormData();

                        fd.append('questionID', questionID);
                        fd.append('questionCategory', questionCategory);

                        
                        fd.append('question', question_edit);
                        fd.append('optionA', optionA_edit);
                        fd.append('optionB', optionB_edit);
                        fd.append('optionC', optionC_edit);
                        fd.append('optionD', optionD_edit);
                        fd.append('select', select_edit);

                                
                        $(this).prop('disabled', true);
                        $(this).html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                        $.ajax({
                            type: 'POST',
                            url: '../../controller/scripts/owner/questionbank/tari_question_update_direct.php',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function (result) {

                            // alert(result);

                            $("#Update_question_direct").prop('disabled', false);
                            $("#Update_question_direct").html('Update Question');

                            if(result == '0'){

                                 $.wnoty({
                                    type: 'warning',
                                    message: 'Question Not Updated',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true
                                 });

                            }else{

                                $('.updated_question'+questionID).html(result);

                                $('#edit_question_direct').modal('hide');

                                $.wnoty({
                                    type: 'success',
                                    message: 'Question Updated Successfully',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true
                                 });
                            }

                            }
                        });

                    }

                }
                else{

                    if(questionCategory == 'Theory'){

                        var question_edit = $('.question29_direct').val();
                       
                        // alert(question_edit);

                        if(question_edit == "") {

                            $.wnoty({
                                type: 'warning',
                                message: 'Please fill in all Question Fields',
                                autohideDelay: 3000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });

                        }
                        else{

                            var fd = new FormData();

                            fd.append('questionID', questionID);
                            fd.append('questionCategory', questionCategory);
                            fd.append('question', question_edit);


                            $(this).prop('disabled', true);
                            $(this).html('Submitting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');



                            


                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/questionbank/tari_question_update_direct.php',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (result) {

                                    // alert(result);

                                    $("#Update_question_direct").prop('disabled', false);
                                    $("#Update_question_direct").html('Update Question');

                                    if(result == '0'){

                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Question Not Updated',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });

                                    }else{

                                        $('.updated_question'+questionID).html(result);
                                        $('#edit_question_direct').modal('hide');
                                        // alert(questionID);

                                        $.wnoty({
                                            type: 'success',
                                            message: 'Question Updated Successfully',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });
                                    }



                                
                                }
                            });
                        }


                    }

                }

        });




         $('body').on('click', '#delete_question', function() {

                  var questionID = $(this).data('id');
                  var campusID = $(this).data('camp');

               

                  

                 $('#prosloaddeletequestioncontent').val(questionID);
                 $('#prosloadcampusfordeletecontenthere').val(campusID);



        });


        $('body').on('click', '.prossubmitdeletequestionfinal_btn', function() {



                   $('.prossubmitdeletequestionfinal_btn').html('deleting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                   $('.prossubmitdeletequestionfinal_btn').prop('disabled', true);

                   var prosloadDeleteID =   $('#prosloaddeletequestioncontent').val();
                   var campusID =     $('#prosloadcampusfordeletecontenthere').val();

                   var prosdel_status =  'single';
                  

                  $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/questionbank/prosdeletequestionfinal.php",
                    data: {prosloadDeleteID: prosloadDeleteID,campusID:campusID,prosdel_status:prosdel_status},
                    //cache: false,
                    success: function (output) {
                        
                        $('.prossubmitdeletequestionfinal_btn').prop('disabled', false);
                       

                          if(output.trim() == '1')
                          {


                                       $.wnoty({
                                            type: 'success',
                                            message: 'Question deleted successfully',
                                            autohideDelay: 500, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });
                                        
                                          $('#prosloadquestioncontent'+prosloadDeleteID).remove();

                                        $('#delete_question_direct').modal('hide');
                                        

                                        

                          }else
                          {


                                      $.wnoty({
                                            type: 'error',
                                            message: 'Failed!! Delete was not successful please try again.',
                                            autohideDelay: 500, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });


                          }


                         // Get Subject from Database
                    }
                 });

                        
        });



                // SELECT ALL QUESTION CHECKBOX
                $("body").on("change", "#pros_select_all_question", function () {  //"select all" change 
                        
                    var checkStatus = $(this).prop('checked');

                        if (checkStatus == true) {
        
                            $(".prosloadquestioncheckbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        
                            var selTotal = $('.prosloadquestioncheckbox:checked').length;
        
                            $('#pros_question_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                            $("#pros_question_total_selected").fadeIn("slow");
        
                        }
                        else if (checkStatus == false) {
        
                            $(".prosloadquestioncheckbox").prop('checked', false); //change "select all" checked status to false
                            var selTotal = $('.prosloadquestioncheckbox:checked').length;
                            $("#pros_question_total_selected").fadeOut("slow");
                        }

                });

        


                                        // select single parent checkbox
                        $('body').on('change', '.prosloadquestioncheckbox', function () {

                        if ($('.prosloadquestioncheckbox:checked').length == $('.prosloadquestioncheckbox').length) {

                            $("#pros_select_all_question").prop('checked', true);
                            var selTotal = $('.prosloadquestioncheckbox:checked').length;

                            if (selTotal > 0) {
                                $('#pros_question_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                                $("#pros_question_total_selected").fadeIn("slow");
                            }
                            else {
                                $("#pros_question_total_selected").fadeOut("slow");
                            }

                        }
                        else if ($('.prosloadquestioncheckbox:checked').length != $('.prosloadquestioncheckbox').length) {

                            $("#pros_select_all_question").prop('checked', false);
                            var selTotal = $('.prosloadquestioncheckbox:checked').length;

                            if (selTotal > 0) {
                                $('#pros_question_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                                $("#pros_question_total_selected").fadeIn("slow");
                            }
                            else {
                                $("#pros_question_total_selected").fadeOut("slow");
                            }
                        }


                        });


                        // PROS DELETE QUESTION IN BULK  CLICK 

                             $('body').on('click', '.prossubmitdeletequestionfinalall_btn', function () {
                                  

                                  var prosdel_status =  'bulk';

                                    var campusID = [];
                                    var QuestionID = [];


                            
                                    $.each($(".prosloadquestioncheckbox:checked"), function(){

                                        campusID.push($(this).data('camp'));
                                        QuestionID.push($(this).val());
                                    });


                                    if(QuestionID  == '' || QuestionID == '0')
                                    {


                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!! please select questions to be deleted before you proceed.',
                                            autohideDelay: 2000, // 5 seconds
                                            position:'top-right',
                                            autohide:true
                                        });

                                        $('.prossubmitdeletequestionfinalall_btn').prop('disabled', false);
                                        $('.prossubmitdeletequestionfinalall_btn').html('Delete');

                                    }else
                                    {

                                        $('.prossubmitdeletequestionfinalall_btn').html('deleting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                                        $('.prossubmitdeletequestionfinalall_btn').prop('disabled', false);
                                        $('.prossubmitdeletequestionfinalall_btn').html('Delete');




                                        $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/questionbank/prosdeletequestionfinal.php",
                                        data: {prosloadDeleteID: QuestionID,campusID:campusID,prosdel_status:prosdel_status},
                                        //cache: false,
                                        success: function (output) {
                                        

                                            if(output.trim() == '1')
                                            {


                                                          $.wnoty({
                                                                type: 'success',
                                                                message: 'Question deleted successfully',
                                                                autohideDelay: 500, // 5 seconds
                                                                position:'top-right',
                                                                autohide: true
                                                            });

                                                            $('#delete_question_directall').modal('hide');
                                                          
                                                            prosloadquestionfrombanktoview();

                                                           

                                                         

                                            }else
                                            {


                                                        $.wnoty({
                                                                type: 'error',
                                                                message: 'Failed!! Delete was not successful please try again.',
                                                                autohideDelay: 500, // 5 seconds
                                                                position:'top-right',
                                                                autohide: true
                                                            });


                                            }


                                            // Get Subject from Database
                                        }
                                    });


                                    }

                             });
                         // PROS DELETE QUESTION IN BULK  CLICK 

                        




        


        </script>

   
    

   