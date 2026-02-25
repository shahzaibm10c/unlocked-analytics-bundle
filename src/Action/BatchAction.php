<?php

declare(strict_types=1);

namespace M10c\UnlockedAnalyticsBundle\Action;

use M10c\UnlockedAnalyticsBundle\Factory\AnalyticsRequestFactoryInterface;
use M10c\UnlockedAnalyticsBundle\RequestHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class BatchAction
{
    public function __construct(
        private readonly AnalyticsRequestFactoryInterface $analyticsRequestFactory,
        private readonly RequestHandler $requestHandler,
    ) {
    }

    #[Route('/analytics/batch', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $analyticsRequest = $this->analyticsRequestFactory->fromSymfonyRequest($request, true);
        ($this->requestHandler)($analyticsRequest);

        return new JsonResponse();
    }
}
