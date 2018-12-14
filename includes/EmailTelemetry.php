<?php

/**
 * Measure email throughput to determine the potential scale of email related issues.
 */
class NF_EmailTelemetry
{
    private $is_opted_in = false;

    /**
     * Constructor which takes in a paremeter to tell the class whether the site is opted 
     * in for telemetry or not
     * 
     * @param $opted_in
     * 
     * @since UPDATE_VERSION
     */
    public function __construct( $opted_in = false ) {
        $this->is_opted_in = $opted_in;
    }
    

    /**
     * @hook phpmailer_init The last action before the email is sent.
     */
    public function setup()
    {

        if( $this->is_opted_in ) {
            /**
             * @link https://codex.wordpress.org/Plugin_API/Action_Reference/phpmailer_init
             */
            add_action( 'phpmailer_init', array( $this, 'update_metrics' ) );
        }

    }
    
    /** 
     * @NOTE No need to return $phpmailer as it is passed in by reference (aka Output Parameter). 
     */
    public function update_metrics(&$phpmailer)
    {
        $send_count_metric = NF_Telemetry_MetricFactory::create( 'CountMetric', 'nf_email_send_count' );
        $send_count_metric->increment();

        $recipient_count = count( $phpmailer->getAllRecipientAddresses() );
        $recipient_count_metric = NF_Telemetry_MetricFactory::create( 'CountMetric', 'nf_email_recipient_count' );
        $recipient_count_metric->increment( $recipient_count );

        $recipient_max_metric = NF_Telemetry_MetricFactory::create( 'MaxMetric', 'nf_email_recipient_max' );
        $recipient_max_metric->update( $recipient_count );

        $attachment_count = count( $phpmailer->getAttachments() );
        $attachment_count_metric = NF_Telemetry_MetricFactory::create( 'CountMetric', 'nf_email_attachment_count' );
        $attachment_count_metric->increment( $attachment_count );

        $attachment_filesize_count_metric = NF_Telemetry_MetricFactory::create( 'CountMetric', 'nf_email_attachment_filesize_count' );
        $attachment_filesize_max_metric = NF_Telemetry_MetricFactory::create( 'MaxMetric', 'nf_email_attachment_filesize_max' );
        foreach( $phpmailer->getAttachments() as $attachment ) {
            $filename = $attachment[0];
            if( $filesize = filesize( $filename ) ){
                $attachment_filesize_count_metric->increment( $filesize );
                $attachment_filesize_max_metric->update( $filesize );
            }
        }
    }
}
