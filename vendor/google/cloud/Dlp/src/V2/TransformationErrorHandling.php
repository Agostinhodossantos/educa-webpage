<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * How to handle transformation errors during de-identification. A
 * transformation error occurs when the requested transformation is incompatible
 * with the data. For example, trying to de-identify an IP address using a
 * `DateShift` transformation would result in a transformation error, since date
 * info cannot be extracted from an IP address.
 * Information about any incompatible transformations, and how they were
 * handled, is returned in the response as part of the
 * `TransformationOverviews`.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.TransformationErrorHandling</code>
 */
class TransformationErrorHandling extends \Google\Protobuf\Internal\Message
{
    protected $mode;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Dlp\V2\TransformationErrorHandling\ThrowError $throw_error
     *           Throw an error
     *     @type \Google\Cloud\Dlp\V2\TransformationErrorHandling\LeaveUntransformed $leave_untransformed
     *           Ignore errors
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * Throw an error
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.TransformationErrorHandling.ThrowError throw_error = 1;</code>
     * @return \Google\Cloud\Dlp\V2\TransformationErrorHandling\ThrowError
     */
    public function getThrowError()
    {
        return $this->readOneof(1);
    }

    /**
     * Throw an error
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.TransformationErrorHandling.ThrowError throw_error = 1;</code>
     * @param \Google\Cloud\Dlp\V2\TransformationErrorHandling\ThrowError $var
     * @return $this
     */
    public function setThrowError($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\TransformationErrorHandling_ThrowError::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Ignore errors
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.TransformationErrorHandling.LeaveUntransformed leave_untransformed = 2;</code>
     * @return \Google\Cloud\Dlp\V2\TransformationErrorHandling\LeaveUntransformed
     */
    public function getLeaveUntransformed()
    {
        return $this->readOneof(2);
    }

    /**
     * Ignore errors
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.TransformationErrorHandling.LeaveUntransformed leave_untransformed = 2;</code>
     * @param \Google\Cloud\Dlp\V2\TransformationErrorHandling\LeaveUntransformed $var
     * @return $this
     */
    public function setLeaveUntransformed($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\TransformationErrorHandling_LeaveUntransformed::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->whichOneof("mode");
    }

}

