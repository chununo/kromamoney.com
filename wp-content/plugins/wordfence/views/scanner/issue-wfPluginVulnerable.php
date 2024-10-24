<?php
if (!defined('WORDFENCE_VERSION')) { exit; }
/**
 * Presents an issue template.
 */
echo wfView::create('scanner/issue-base', array(
	'internalType' => 'wfPluginVulnerable',
	'displayType' => __('Plugin Vulnerable', 'wordfence'),
	'iconSVG' => '<svg viewBox="0 0 20 20"><g><path d="M13.11 4.36L9.87 7.6 8 5.73l3.24-3.24c.35-.34 1.05-.2 1.56.32.52.51.66 1.21.31 1.55zm-8 1.77l.91-1.12 9.01 9.01-1.19.84c-.71.71-2.63 1.16-3.82 1.16H6.14L4.9 17.26c-.59.59-1.54.59-2.12 0-.59-.58-.59-1.53 0-2.12l1.24-1.24v-3.88c0-1.13.4-3.19 1.09-3.89zm7.26 3.97l3.24-3.24c.34-.35 1.04-.21 1.55.31.52.51.66 1.21.31 1.55l-3.24 3.25z"/></g></svg>',
	'summaryControls' => array(wfView::create('scanner/issue-control-ignore', array('ignoreC' => __('Ignore', 'wordfence'))), wfView::create('scanner/issue-control-show-details')),
	'detailPairs' => array(
		__('Plugin Name', 'wordfence') => '${data.Name}',
		__('Current Plugin Version', 'wordfence') => '${data.Version}',
		null,
		__('Details', 'wordfence') => '{{html longMsg}}',
		null,
		__('Repository URL', 'wordfence') => array('data.wpURL', '<a href="${data.wpURL}" target="_blank" rel="noopener noreferrer"><span class="wf-hidden-xs wf-split-word">${data.wpURL}</span><span class="wf-visible-xs">' . __('View', 'wordfence') . '</span><span class="screen-reader-text"> (' . esc_html__('opens in new tab', 'wordfence') . ')</span></a>'),
		__('Vulnerability Information', 'wordfence') => array('data.vulnerabilityLink', '<a href="${data.vulnerabilityLink}" target="_blank" rel="noopener noreferrer"><span class="wf-hidden-xs wf-split-word">${data.vulnerabilityLink}</span><span class="wf-visible-xs">' . __('View', 'wordfence') . '</span><span class="screen-reader-text"> (' . esc_html__('opens in new tab', 'wordfence') . ')</span></a>'),
		__('Vulnerability Severity', 'wordfence') => array('data.cvssScore', '${data.cvssScore}/10.0 (<span class="${data.severityClass}" data-tooltip="test" title="This is the severity of the vulnerability itself, which can differ from the scan result severity. Some lower-severity vulnerabilities may still be important to address depending on your site\'s configuration and user base, so they are still important for you to review.">${data.severityLabel}</span>)'),
	),
	'detailControls' => array(
		'<a href="#" class="wf-btn wf-btn-default wf-btn-callout-subtle wf-issue-control-mark-fixed" role="button">' . __('Mark as Fixed', 'wordfence') . '</a>',
		'<a href="' . esc_url(wfUtils::wpAdminURL('plugins.php')) . '" class="wf-btn wf-btn-default wf-btn-callout-subtle wf-issue-control-manage-plugins">' . __('Manage Plugins', 'wordfence') . '</a>',
	),
	'textOutput' => (isset($textOutput) ? $textOutput : null),
	'textOutputDetailPairs' => array(
		__('Plugin Name', 'wordfence') => '$data.Name',
		__('Current Plugin Version', 'wordfence') => '$data.Version',
		null,
		__('Details', 'wordfence') => '$longMsg',
		null,
		__('Vulnerability Information', 'wordfence') => '$data.vulnerabilityLink',
		__('Vulnerability Severity', 'wordfence') => '${data.cvssScore}/10.0 (${data.severityLabel})',
	),
))->render();