ntProgressApplicationInProgressText', 'EnrollmentProgressApplicationFinishedText',
                'EnrollmentProgressCertificateNotStartedText', 'EnrollmentProgressCertificateInProgressText', 'EnrollmentProgressCertificateFinishedText', 'EnrollmentProgressNotifyOfNotificationText',
                'UserNarratorText', 'ServerUrlNarratorText'];
            keyList.forEach(function (key) {
                var resourceId = '/unifiedEnrollment/' + key;
                unifiedEnrollmentResources[key] = WinJS.Resources.getString(resourceId).value;
            });
            return JSON.stringify(unifiedEnrollmentResources);
        }
        UnifiedEnroll.localizedStrings = localizedStrings;
        function localizedProvProgressStrings() {
            var unifiedEnrollmentResources = {};
            var keyList = ['BootstrapPageTitle', 'BootstrapPageRebootWarning', 'BootstrapPageDevicePrepTitle', 'BootstrapPageDeviceSetupTitle', 'BootstrapPageAccountSetupTitle', 'BootstrapPageShowDetailButton',
            'BootstrapPageGettingReady', 'BootstrapPageWaitingForPrevious', 'BootstrapPageComplete', 'BootstrapPageWorking', 'BootstrapPageStillWorking', 'BootstrapPageTPM', 'BootstrapPageAADJ',
            'BootstrapPageMDM', 'BootstrapPageIdentifying', 'BootstrapPageSecurityPolicies', 'BootstrapPageCertificates', 'BootstrapPageNetwork', 'BootstrapPageApps', 'BootstrapPagePolicyTrack',
            'BootstrapPageNetworkTrack', 'BootstrapPageAppTrack', 'BootstrapPageDontClose', 'BootstrapPagePatience', 'BootstrapPageFailed', 'BootstrapPageDefualtError', 'BootstrapPageCollectLogs',
            'BootstrapPageResetDevice', 'BootstrapPageTryAgain', 'BootstrapPageContinue', 'BootstrapPagePrevStepFailed', 'BootstrapPageContinueMessage', 'BootstrapPageSignInWait', 'BootstrapPageNotSetUp'];
            keyList.forEach(function (key) {
                var resourceId = '/unifiedEnrollment/' + key;
                unifiedEnrollmentResources[key] = WinJS.Resources.getString(resourceId).value;
            });
            return JSON.stringify(unifiedEnrollmentResources);
        }
        UnifiedEnroll.localizedProvProgressStrings = localizedProvProgressStrings;
    })(UnifiedEnroll = CloudExperienceHost.UnifiedEnroll || (CloudExperienceHost.UnifiedEnroll = {}));
})(CloudExperienceHost || (CloudExperienceHost = {}));                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                