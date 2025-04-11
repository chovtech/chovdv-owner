    <div class="row g-2">
        <div class="col-md-10 col-lg-10"></div>
        <div class="col-md-2 col-md-2">
            <button type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#budgetModalforadditems" style="float: right; font-size: 12px;" >
                <i class="fa fa-plus" aria-hidden="true"></i> Set Budget
            </button>
        </div>
    </div> 

    <div class="row g-2 mt-3">
            <div class="col-md-6 col-lg-2">
                <select style="color: #666666;" class="form-select form-select-sm"
                    aria-label="form-select-sm example"
                    id="emma_load_campus_for_budget">
                    <option value="NULL">Select campus</option>
                </select>
            </div>

            <div class="col-md-6 col-lg-2">
                <select style="color: #666666;" class="form-select form-select-sm"
                    aria-label="form-select-sm example"
                    id="emma_load_session_for_budget">
                    <option value="NULL">Select Session</option>
                </select>
            </div>

            <div class="col-md-6 col-lg-2">
                <select style="color: #666666;" class="form-select form-select-sm"
                    aria-label="form-select-sm example"
                    id="emma_load_term_for_budget">
                    <option value="NULL">Select Term</option>
                </select>
            </div>

            <div class="col-md-6 col-lg-2">
                <select style="color: #666666;" class="form-select form-select-sm"
                    aria-label="form-select-sm example"
                    id="emma_load_category_for_budget">
                    <option value="NULL">Transaction Type</option>
                    <option value="income">Income</option>
                    <option value="expenditure">Expenditure</option>
                </select>
            </div>

            <div class="col-md-6 col-lg-2">
              
            </div>

            <div class="col-md-12 col-lg-2">
                <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                    class="btn btn-sm btn-primary text-light" id="emmaloadbudgetingvalues" data-bs-toggle="modal"
                    data-bs-target="#"> <i class="fas fa-sync-alt"> Load</i></button>
            </div>
    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-12">
            <div class="bg-white p-3" style="border-radius:5px;">
                <div align="center" class="emmaloadbudgettable">
                    <img src="../../assets/images/adminImg/filter.png" style="width: 15%;" alt="">
                    <p></p>
                    <h6>Please filter to proceed.</h6>
                </div>
            </div>
        </div>
    </div>