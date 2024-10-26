<div class="alert">
    <div class="message-box message-box-info <?php echo ($messageType === 'info') ? '' : 'hidden'; ?>">
        <i class="fa fa-info-circle fa-2x"></i>
        <span class="message-text"><strong>Info:</strong> <?php echo isset($infoMessage) ? $infoMessage : 'User pending action'; ?></span>
        <i class="fa fa-times fa-2x exit-button"></i>
    </div>
    <div class="message-box message-box-warn <?php echo ($messageType === 'warn') ? '' : 'hidden'; ?>">
        <i class="fa fa-warning fa-2x"></i>
        <span class="message-text"><strong>Warning:</strong> <?php echo isset($warningMessage) ? $warningMessage : 'User has to be admin'; ?></span>
        <i class="fa fa-times fa-2x exit-button"></i>
    </div>
    <div class="message-box message-box-error <?php echo ($messageType === 'error') ? '' : 'hidden'; ?>">
        <i class="fa fa-ban fa-2x"></i>
        <span class="message-text"><strong>Error:</strong> <?php echo isset($errorMessage) ? $errorMessage : 'Internal Server Error'; ?></span>
        <i class="fa fa-times fa-2x exit-button"></i>
    </div> 
    <div class="message-box message-box-success <?php echo ($messageType === 'success') ? '' : 'hidden'; ?>">
        <i class="fa fa-check fa-2x"></i>
        <span class="message-text"><strong>Success:</strong> <?php echo isset($successMessage) ? $successMessage : 'Updated member status'; ?></span>
        <i class="fa fa-times fa-2x exit-button"></i>
    </div>      
</div>



