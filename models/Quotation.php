<?php

use ORM;
use RuntimeException;

Class Quotation
{
    private int $quotaion_id;

    private int $client_id;

    private int $underwriter_id;

    // Jacket
    private int $base_policy_template_id;

    // Endorsements, Riders... by ID
    private array $modifications;

    private string $age;

    private string $currency_id;

    private DateTime $start_date;

    private DateTime $end_date;

    private int $total;

    private DateTime $date_quoted;

// currency_id listed redundantly in requirements document

    private string $validation_error_message;

    private bool $drip_campaign_active;

    private int $drip_campaign_id;

    private int $drip_campaign_stage_id;

    public function __construct(int $client_id, int $quotation_id = null) {
        $this->client_id = $client_id; //required
        $this->quotaion_id = $quotation_id;

        if (isset($quotation_id)) {
            $this->loadQuotation($quotation_id);
        }
    }

    // stored as immutable records-- updates supercede records stored earlier
    public function saveQuotation(): bool {
        if ($this->validateQuotation()) {
            try {
                $this->age = $this->sortAge($this->age);
                // insert into persistent storage for these type of quotations
            }
            catch (Exception $exception) {
                throw new RuntimeException('Failed to save to persistent storage', 0);
            }
            return true;
        }
        else {
            throw new RuntimeException('Failed saving quotation at verification', 0);
        }
    }

    // unnecessary !!! public function updateQuotation() {}

    public function retriveQuotationsByDate(DateTime $search_date_start, DateTime $search_date_end, int $limit = 10): array {
        // 2688 -- when Rufus, goes to meet a young Bill & Ted... why not...
        $quotations = [];
        $search_date_start
        // get quotations
        // select from quotations where client_id = $client_id where $date_quoted > $search_date_start and $date_quoted < $search_date_end limit $limit
        return $quotations;

    }

    public function retrieveQuotationsById(array $quotation_ids_array): array {
        $quotations = [];

        for ($i = 0; $i < sizeof($quotation_ids_array); $i++) {
            // I could have used a where in to select a record set instead of going in
            // but, pressed for time
            $quotation[] = $this->retrieveQuotationById($quotation_ids_array[$i]);
        }
    }

    public function retrieveQuotationById(int $quotation_id): Quotation {
        if (isset())
        //select from quotations where quotation_id = $quotation_id
        return $quotationObject;
    }

    public function loadQuotation(int $quotation_id): Quotation {
        //oh jeez, I don't have time to mock the service and set all the properties
    }

    private function validateQuotation(): bool {
        // Oi, I'm just doing one validation.
        // If I have a choice I elminate nulls in my code in general-- no need to test in that case. But, if I must, I do.
        // Exists if required.
        // Not empty if it isn't allowed to be empty (string). Lower length limit.
        // Not too long (string). Upper length limit.
        // Or numerical max/min value, similar for dates.
        // The code handles it being the right type via baked in data type system.
        $validationErrorMessage = 'A mock validation error message';
        $this->setValidationError($validationErrorMessage);
        // Validation generally doesn't throw exceptions-- the app should do error handling and allow a second try
        // ...with a helpful error message to guide people
        // validation functions defined in a library or class-- I like
        return true;
        return false;
    }

    private function setValidationError(string $validationError) {
        $this->validation_error_message = $validationError;
    }

    private function dummyDatabaseFunction() {
        return true;
    }

    private function generateSortedAgeArray(array $age): array
    {
        $ageArray = explode(',', $age);
        return sort($ageArray, SORT_NUMERIC);
    }

}