 <?php

namespace epepee\FlashMsg;

/**
* Class for displaying flash messages
*/
class FlashMsg implements \Anax\DI\IInjectionAware {

    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize() {
        if (!$this->session->has('flashmsgs')) {
            $this->session->set('flashmsgs', array());
        }
    }

    /**
     * Add message to session array
     *
     * @param $type string with message type
     * @param $message string with message text
     *
     * @return void
     */
    public function setMessage($type, $message) {
        $temp = $this->session->get('flashmsgs');
        $temp[] = array('type' => $type, 'content' => $message);
        $this->session->set('flashmsgs', $temp);
    }

    /**
     * Add alert message to session array
     *
     * @param $message string with message text
     *
     * @return void
     */
    public function alert($message) {
        $this->setMessage('alert', $message);
    }

    /**
     * Add error message to session array
     *
     * @param $message string with message text
     *
     * @return void
     */
    public function error($message) {
        $this->setMessage('error', $message);
    }

    public function info($message) {
        $this->setMessage('info', $message);
    }

    /**
     * Add notice message to session array
     *
     * @param $message string with message text
     *
     * @return void
     */
    public function notice($message) {
        $this->setMessage('notice', $message);
    }

    /**
     * Add success message to session array
     *
     * @param $message string with message text
     *
     * @return void
     */
    public function success($message) {
        $this->setMessage('success', $message);
    }

    /**
     * Add warning message to session array
     *
     * @param $message string with message text
     *
     * @return void
     */
    public function warning($message) {
        $this->setMessage('warning', $message);
    }

    /**
     * Build HTML of messages in session array
     *
     * @return $output HTML string with messages
     */
    public function outputMsgs() {
        $messages = $this->session->get('flashmsgs');
        $output = null;

        if ($messages) {
            foreach ($messages as $key => $message) {
                $output .= '<div class="' . $message['type'] . '"><p>' . $message['content'] . '</p></div>';
            }
        }

        return $output;
    }

    /**
     * Clear session message array
     *
     * @return void
     */
    public function clearMessages() {
        $this->session->set('flashmsgs', []);
    }
} 