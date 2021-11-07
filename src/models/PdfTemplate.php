<?php
namespace verbb\formie\models;

use craft\helpers\ArrayHelper;
use craft\helpers\UrlHelper;

use verbb\formie\Formie;
use verbb\formie\records\PdfTemplate as PdfTemplateRecord;

class PdfTemplate extends BaseTemplate
{
    // Properties
    // =========================================================================

    public $filenameFormat = 'Submission-{submission.id}';
    public $hasSingleTemplate = true;


    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();

        $rules[] = ['template', 'required'];

        return $rules;
    }

    /**
     * Returns the CP URL for editing the template.
     *
     * @return string
     */
    public function getCpEditUrl(): string
    {
        return UrlHelper::cpUrl('formie/settings/pdf-templates/edit/' . $this->id);
    }

    /**
     * Returns true if the template is allowed to be deleted.
     *
     * @return bool
     */
    public function canDelete(): bool
    {
        $notifications = Formie::$plugin->getNotifications()->getAllNotifications();
        $notification = ArrayHelper::firstWhere($notifications, 'pdfTemplateId', $this->id);

        return !$notification;
    }

    protected function getRecordClass(): string
    {
        return PdfTemplateRecord::class;
    }
}
