<?php

namespace Tests\Unit\Api\PortalSessions;

use Globalis\Chargebee\Api\PortalSessions\PortalSession;
use Tests\Unit\Api\TestCase;

class PortalSessionTest extends TestCase
{
    /** @test */
    public function should_find_portal_session()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/portal_session.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/portal_sessions/portal_3Nl8LlrQWK2ji4K')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->find('portal_3Nl8LlrQWK2ji4K'));
    }

    /** @test */
    public function should_activate_portal_session()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/portal_session_activated.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/portal_sessions/portal_3Nl8LlrQWK2ji4K/activate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->activate('portal_3Nl8LlrQWK2ji4K', []));
    }

    /** @test */
    public function should_logout_portal_session()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/portal_session_logged_out.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/portal_sessions/portal_3Nl8LlrQWK2ji4K/logout', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->logout('portal_3Nl8LlrQWK2ji4K', []));
    }

    /** @test */
    public function should_create_portal_session()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/portal_session_logged_out.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/portal_sessions', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->create([]));
    }

    protected function getApiClass()
    {
        return PortalSession::class;
    }
}
