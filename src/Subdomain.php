<?php

namespace LVR\Subdomain;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Subdomain
 *
 * @package \LVR\Subdomain
 */
class Subdomain implements Rule
{
    /**
     * List of reserved subdomains
     *
     * @var array
     */
    protected static $reserved = [
      'a', 'about', 'aboutu', 'abuse', 'acme', 'ad', 'admanager', 'admin', 'admindashboard', 'administrator', 'ads',
      'adsense', 'adult', 'adword', 'adwords', 'affiliate', 'affiliatepage', 'affiliates', 'afp', 'alpha', 'anal',
      'analytic', 'android', 'answer', 'anu', 'anus', 'ap', 'api', 'api1', 'api2', 'api3',
      'app', 'appengine', 'application', 'appnew', 'arse', 'as', 'asdf', 'ass', 'asset', 'assets',
      'assets1', 'assets2', 'assets3', 'assets4', 'assets5', 'asshole', 'atf', 'backup', 'ball', 'balls',
      'ballsack', 'bank', 'base', 'bastard', 'beginner', 'beta', 'biatch', 'billing', 'binarie', 'binary',
      'bitch', 'biz', 'blackberry', 'blog', 'blogsearch', 'bloody', 'blowjob', 'blowjobs', 'bollock', 'boner',
      'boob', 'boobs', 'book', 'bugger', 'bum', 'butt', 'buttplug', 'buy', 'buzz', 'c',
      'cache', 'calendar', 'cart', 'catalog', 'ceo', 'chart', 'chat', 'checkout', 'ci', 'cia',
      'client', 'clients', 'clitori', 'clitoris', 'cname', 'cnarne', 'cock', 'code', 'community', 'confirm',
      'confirmation', 'contact', 'contact-u', 'contactu', 'content', 'controlpanel', 'coon', 'core', 'corp', 'countrie',
      'country', 'cp', 'cpanel', 'crap', 'cs', 'css', 'css1', 'css2', 'css3', 'cunt',
      'cv', 'damn', 'dashboard', 'data', 'demo', 'deploy', 'deployment', 'desktop', 'dev', 'devel',
      'developement', 'developer', 'developers', 'development', 'dick', 'dike', 'dildo', 'dir', 'directory', 'discussion',
      'dl', 'doc', 'docs', 'document', 'donate', 'download', 'dyke', 'e', 'earth', 'email',
      'enable', 'encrypted', 'engine', 'error', 'errorlog', 'fag', 'faggot', 'fbi', 'feature', 'feck',
      'feed', 'feedburner', 'feedproxy', 'feeds', 'felching', 'fellate', 'fellatio', 'file', 'files', 'finance',
      'flange', 'folder', 'forgotpassword', 'forum', 'friend', 'ftp', 'fuck', 'fudgepacker', 'fun', 'fusion',
      'gadget', 'gear', 'geographic', 'gettingstarted', 'git', 'gitlab', 'gmail', 'go', 'goddamn', 'goto',
      'gov', 'graph', 'graphs', 'group', 'hell', 'help', 'home', 'homo', 'html', 'htrnl',
      'http', 'https', 'i', 'image', 'images', 'imap', 'img', 'img1', 'img2', 'img3',
      'investor', 'invoice', 'invoices', 'io', 'ios', 'ipad', 'iphone', 'irnage', 'irng', 'item',
      'j', 'jenkin', 'jerk', 'jira', 'jizz', 'job', 'join', 'js', 'js1', 'js2',
      'kb', 'knobend', 'knowledgebase', 'lab', 'labia', 'legal', 'lesbo', 'list', 'lmao', 'lmfao',
      'local', 'locale', 'location', 'log', 'login', 'logout', 'logs', 'm', 'mail', 'manage',
      'manager', 'map', 'marketing', 'me', 'media', 'message', 'misc', 'mm', 'mms', 'mobile',
      'model', 'money', 'movie', 'muff', 'mx', 'my', 'mystore', 'n', 'net', 'network',
      'networks', 'new', 'news', 'newsite', 'nigga', 'nigger', 'npm', 'ns', 'ns1', 'ns2',
      'ns3', 'ns4', 'ns5', 'omg', 'online', 'order', 'org', 'other', 'p0rn', 'pack',
      'packagist', 'page', 'pages', 'partner', 'partnerpage', 'partners', 'password', 'payment', 'payments', 'peni',
      'penis', 'people', 'person', 'pi', 'pis', 'piss', 'place', 'podcast', 'policy', 'poop',
      'pop', 'pop3', 'popular', 'porn', 'pr0n', 'press', 'pricing', 'prick', 'print', 'privacy',
      'private', 'prod', 'product', 'production', 'profile', 'promo', 'promotion', 'proxie', 'proxies', 'proxy',
      'pube', 'public', 'purchase', 'pussy', 'queer', 'querie', 'queries', 'query', 'r', 'radio',
      'random', 'reader', 'recover', 'redirect', 'register', 'registration', 'release', 'report', 'research', 'resolve',
      'resolver', 'rnail', 'rnicrosoft', 'root', 'rs', 'rss', 'sale', 'sandbox', 'scholar', 'scrotum',
      'search', 'secure', 'seminar', 'server', 'servers', 'service', 'sex', 'sftp', 'sh1t', 'shit',
      'shop', 'shopping', 'shortcut', 'signin', 'signup', 'site', 'sitemap', 'sitenew', 'sitenews', 'sites',
      'sketchup', 'sky', 'slash', 'slashinvoice', 'slut', 'sm', 'smegma', 'sms', 'smtp', 'soap',
      'software', 'sorry', 'spreadsheet', 'spunk', 'srntp', 'ssh', 'ssl', 'stage', 'staging', 'stat',
      'static', 'statistic', 'statistics', 'stats', 'statu', 'status', 'store', 'suggest', 'suggestquerie', 'suggestquery',
      'support', 'survey', 'surveys', 'surveytool', 'svn', 'sync', 'sysadmin', 'talk', 'talkgadget', 'test',
      'tester', 'testing', 'text', 'tit', 'tits', 'tool', 'toolbar', 'tosser', 'trac', 'translate',
      'translation', 'translator', 'trend', 'turd', 'twat', 'txt', 'ul', 'upload', 'uploads', 'vagina',
      'validation', 'validations', 'vid', 'video', 'video-stat', 'videos', 'voice', 'w', 'wank', 'wave',
      'webdisk', 'webmail', 'webmaster', 'webrnail', 'whm', 'whoi', 'whois', 'whore', 'wifi', 'wiki',
      'wtf', 'ww', 'www', 'www1', 'www2', 'wwww', 'xhtml', 'xhtrnl', 'xml', 'xxx'
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match('/^[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?$/', $value)) {
            return false;
        }

        if (in_array($value, static::$reserved)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not available';
    }
}
